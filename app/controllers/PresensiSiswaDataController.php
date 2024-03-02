<?php

namespace app\controllers;

use Yii;
use app\models\base\PresensiSiswaData;
use app\models\base\PresensiSiswaJadwal;
use app\models\base\PresensiSiswaLog;
use app\models\base\Siswa;
use app\models\PresensiSiswaDataSearch;
use DateTime;
use yii\base\DynamicModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PresensiSiswaDataController implements the CRUD actions for PresensiSiswaData model.
 */
class PresensiSiswaDataController extends Controller
{
    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'app\modules\UserManagement\components\GhostAccessControl',
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all PresensiSiswaData models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PresensiSiswaDataSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionGenerate()
    {
        $model = DynamicModel::validateData(['kodekelas', 'kodeta', 'jenispresensi', 'tglawal', 'tglakhir']);

        $model->addRule(['kodekelas', 'kodeta', 'jenispresensi', 'tglawal', 'tglakhir'], 'required');

        if ($model->load($this->request->post())) {
            $model->tglawal = date('Y-m-d', strtotime($model->tglawal));
            $model->tglakhir = date('Y-m-d', strtotime($model->tglakhir));

            // 1. ambil data siswa yang hanya memiliki kelas berdasarkan parameter tahun ajaran saja atau dengan kodekelas
            $filterkelas = "";
            $params = [':kodeta' => $model->kodeta];
            if ($model->kodekelas != '-all') {
                $filterkelas = "AND historykelas.kodekelas = :kodekelas";
                $params[':kodekelas'] = $model->kodekelas;
            }
            $sql = "SELECT * FROM `siswa` INNER JOIN historykelas ON historykelas.nis = siswa.nis AND historykelas.kodeta = :kodeta $filterkelas LIMIT 2";
            $siswas = Yii::$app->db->createCommand($sql, $params)->queryAll();

            // echo '<pre>';
            // print_r($siswas);
            // echo '</pre>';
            // die;

            // 2. ambil jadwal siswa di join dengan hari untuk mendapatkan hari_id 1-7 dan ditambah kondisi jenis presensi reguler, pondok, dsb
            $jadwals = PresensiSiswaJadwal::find()
                ->select(['*'])
                ->leftJoin('hari', 'hari.kodehari = presensi_siswa_jadwal.kode_hari')
                ->where(['jenispresensi' => $model->jenispresensi])
                ->asArray()->all();

            // echo '<pre>';
            // print_r($jadwals);
            // echo '</pre>';
            // die;

            // 3. ambil data jadwal berdasarkan kodeta, jenispresensi, dan rentang tanggal digunakan sebagai pengecualian ketika generate agar tidak dobel 
            $sql = "SELECT CONCAT(tgl, nis, presensi_siswa_data.jadwalpresensi_id) FROM presensi_siswa_data
                    LEFT JOIN presensi_siswa_jadwal ON presensi_siswa_jadwal.jadwalpresensi_id = presensi_siswa_data.jadwalpresensi_id
                    WHERE kodeta = :kodeta AND presensi_siswa_jadwal.jenispresensi = :jenispresensi AND tgl BETWEEN :tglawal AND :tglakhir";

            $jadwal_datas = Yii::$app->db->createCommand($sql, [
                ':kodeta' => $model->kodeta, ':tglawal' => $model->tglawal, ':tglakhir' => $model->tglakhir, ':jenispresensi' => $model->jenispresensi
            ])->queryColumn();

            // echo '<pre>';
            // print_r($jadwal_datas);
            // echo '</pre>';
            // die;

            $generate_id = time();
            $presensi_batched = [];

            // seharusnya pakai rentang tanggal aja
            $startDate = new DateTime($model->tglawal);
            $endDate = new DateTime($model->tglakhir);

            while ($startDate <= $endDate) {
                $currentDate = $startDate->format('Y-m-d');

                // var_dump($currentDate);
                // var_dump();
                // die;

                foreach ($siswas as $siswa) {
                    foreach ($jadwals as $jadwal) {
                        // cek apakah hari jadwal ada pada tanggal tersebut, jika tidak ada maka skip!
                        if (date('N', strtotime($currentDate)) != $jadwal['hari_id']) {
                            continue;
                        }

                        // if (date('N', strtotime($currentDate)) == $jadwal['hari_id']) {
                        //     echo '<pre>';
                        //     print_r(date('N', strtotime($currentDate)));
                        //     echo '<br>';
                        //     print_r($jadwal);
                        //     echo '</pre>';
                        //     die;
                        // }

                        // cek apakah jadwal sudah ada di database, jika sudah ada maka skip!
                        if (in_array($currentDate . $siswa['nis'] . $jadwal['jadwalpresensi_id'], $jadwal_datas)) {
                            continue;
                        }

                        $presensi = [
                            'jadwalpresensi_id' => $jadwal['jadwalpresensi_id'],
                            'nis' => $siswa['nis'],
                            'tgl' => $currentDate,
                            'hari' => $jadwal['kode_hari'],
                            'kodeta' => $siswa['kodeta'],
                            'kodekelas' => $siswa['kodekelas'],
                            'generate_id' => $generate_id,
                        ];
                        array_push($presensi_batched, $presensi);
                    }
                }

                // Move to the next day
                $startDate->modify('+1 day');
            }
            // echo '<pre>';
            // print_r($presensi_batched);
            // echo '</pre>';
            // die;

            $result = Yii::$app->db->createCommand()->batchInsert('presensi_siswa_data', ['jadwalpresensi_id', 'nis', 'tgl', 'hari', 'kodeta', 'kodekelas', 'generate_id'], $presensi_batched)->execute();

            if ($result) {
                Yii::$app->session->setFlash('success', "$result data presensi telah digenerate.");
            } else {
                Yii::$app->session->setFlash('warning', "Tidak ada data presensi yang digenerate.");
            }
            return $this->redirect(['generate']);
        }

        return $this->render('generate', compact('model'));
    }

    public function actionManual($id)
    {
        $model = $this->findModel($id);
        $model->setScenario(PresensiSiswaData::SCENARIO_MANUAL);

        // $jampulangold = $model->jam_pulang;
        // $model->jam_pulang = null;

        if ($model->load($this->request->post())) {
            // cek apakah jam nya 00:00 maka abaikan
            if ($model->jam_pulang == '00:00:00') {
                $model->jam_pulang = null;
            }

            // jika hadir maka set jam masuk
            // if ($model->status_kehadiran == 'HADIR') {
            //     $model->jam_masuk = date('H:i');
            // } else {
            //     $model->jam_masuk = null;
            // }

            // cek apakah pulang di ceklis?
            // if ($model->jam_pulang == 1) {
            //     $model->jam_pulang = date('H:i');
            // } else {
            //     $model->jam_pulang = $jampulangold;
            // }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Berhasil melakukan presensi.');
                return $this->redirect(['laporan/laporan-harian']);
            }
        }

        $model->jam_pulang = '00:00:00';

        return $this->render('manual', compact('model'));
    }

    public function actionMasuk($jenis)
    {
        $nokartu = $this->request->post('nokartu');
        $tanggal = date('Y-m-d');
        $jam = date('H:i');
        $hari = date('N');

        // $hari = 5;

        $masukjadwal = $this->ambilJadwal($hari, $jenis);

        if ($this->request->isPost && $nokartu != null) {
            // 1. ambil data siswa dan cek
            $sql = "SELECT siswa.nis, siswa.nokartu, siswa.nama, siswa.foto, historykelas.kodeta, historykelas.kodekelas
                    from siswa
                    inner join historykelas on siswa.nis = historykelas.nis
                    left join tahunajaran on historykelas.kodeta = tahunajaran.kodeta
                    where tahunajaran.isaktif = 1 and siswa.nokartu = :nokartu";

            $siswa = Yii::$app->db->createCommand($sql)
                ->bindValue(':nokartu', $nokartu)
                ->queryOne();

            // 1.5. insert dlu ke tabel log presensi
            $log = new PresensiSiswaLog();
            $log->waktu = date('Y-m-d H:i');
            $log->nis = $siswa['nis'];
            $log->nokartu = $nokartu;
            $log->kodeta = $siswa['kodeta'];
            $log->kodekelas = $siswa['kodekelas'];
            $log->jenispresensi = $jenis;
            $log->save();

            if ($siswa == null) {
                Yii::$app->session->setFlash('error', 'Data siswa tidak ditemukan.');
                return $this->redirect(['masuk', 'jenis' => $jenis]);
            }

            // 2. ambil data presensi dan cek
            $sql = "SELECT * FROM presensi_siswa_data
            LEFT JOIN presensi_siswa_jadwal ON presensi_siswa_jadwal.jadwalpresensi_id = presensi_siswa_data.jadwalpresensi_id
            LEFT JOIN siswa ON siswa.nis = presensi_siswa_data.nis
            LEFT JOIN kelas ON kelas.kodekelas = presensi_siswa_data.kodekelas
            WHERE tgl = :tgl and siswa.nokartu = :nokartu AND TIME(:jam) BETWEEN batas_awal_masuk AND batas_akhir_masuk AND jenispresensi = :jenispresensi";

            $presensi_data = Yii::$app->db->createCommand($sql, [
                ':tgl' => $tanggal, ':nokartu' => $nokartu, ':jam' => $jam, ':jenispresensi' => $jenis
            ])->queryOne();

            if ($presensi_data == null) {
                Yii::$app->session->setFlash('error', 'Tidak ada jadwal presensi pada saat ini.');
                return $this->redirect(['masuk', 'jenis' => $jenis]);
            }

            // 3. cek apakah sudah pernah presensi
            if ($presensi_data['status_kehadiran'] != null) {
                Yii::$app->session->setFlash('error', 'Anda sudah presensi ' .  $presensi_data['jenispresensi'] . ' hari ini.');
                return $this->redirect(['masuk', 'jenis' => $jenis]);
            }

            $model = $this->findModel($presensi_data['presensi_id']);

            $model->jam_masuk = $jam;
            $model->status_kehadiran = 'HADIR';
            $model->logmasuk_id = $log->logpresensi_id;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', ucwords($siswa['nama']) . " " . $presensi_data['namakelas'] . " Presensi berhasil <b>" . $model->status_kehadiran . "</b> "  . $presensi_data['jenispresensi']);
                return $this->redirect(['masuk', 'jenis' => $jenis]);
            }
        }

        return $this->render('masuk', compact('tanggal', 'masukjadwal'));
    }

    public function actionPulang($jenis)
    {
        $nokartu = $this->request->post('nokartu');
        $tanggal = date('Y-m-d');
        $jam = date('H:i');
        $hari = date('N');

        // $hari = 5;
        $pulangjadwal = $this->ambilJadwal($hari, $jenis);

        if ($this->request->isPost && $nokartu != null) {
            // 1. ambil data siswa dan cek
            $sql = "SELECT siswa.nis, siswa.nokartu, siswa.nama, siswa.foto, historykelas.kodeta, historykelas.kodekelas
                    from siswa
                    inner join historykelas on siswa.nis = historykelas.nis
                    left join tahunajaran on historykelas.kodeta = tahunajaran.kodeta
                    where tahunajaran.isaktif = 1 and siswa.nokartu = :nokartu";

            $siswa = Yii::$app->db->createCommand($sql)
                ->bindValue(':nokartu', $nokartu)
                ->queryOne();

            // 1.5. insert dlu ke tabel log presensi
            $log = new PresensiSiswaLog();
            $log->waktu = date('Y-m-d H:i');
            $log->nis = $siswa['nis'];
            $log->nokartu = $nokartu;
            $log->kodeta = $siswa['kodeta'];
            $log->kodekelas = $siswa['kodekelas'];
            $log->jenispresensi = $jenis;
            $log->save();

            if ($siswa == null) {
                Yii::$app->session->setFlash('error', 'Data siswa tidak ditemukan.');
                return $this->redirect(['pulang', 'jenis' => $jenis]);
            }

            // 2. ambil data presensi dan cek
            $sql = "SELECT * FROM presensi_siswa_data
            LEFT JOIN presensi_siswa_jadwal ON presensi_siswa_jadwal.jadwalpresensi_id = presensi_siswa_data.jadwalpresensi_id
            LEFT JOIN siswa ON siswa.nis = presensi_siswa_data.nis
            LEFT JOIN kelas ON kelas.kodekelas = presensi_siswa_data.kodekelas
            WHERE tgl = :tgl AND siswa.nokartu = :nokartu AND TIME(:jam) BETWEEN batas_awal_pulang AND batas_akhir_pulang AND jenispresensi = :jenispresensi";

            $presensi_data = Yii::$app->db->createCommand($sql, [
                ':tgl' => $tanggal, ':nokartu' => $nokartu, ':jam' => $jam, ':jenispresensi' => $jenis
            ])->queryOne();

            // var_dump($presensi_data);
            // die;

            if ($presensi_data == null) {
                Yii::$app->session->setFlash('error', 'Tidak ada jadwal presensi pada saat ini.');
                return $this->redirect(['pulang', 'jenis' => $jenis]);
            }

            // 3. cek apakah sudah pernah presensi
            if ($presensi_data['jam_pulang'] != null) {
                Yii::$app->session->setFlash('error', 'Anda sudah presensi ' .  $presensi_data['jenispresensi'] . ' hari ini.');
                return $this->redirect(['pulang', 'jenis' => $jenis]);
            }

            $model = $this->findModel($presensi_data['presensi_id']);

            $model->jam_pulang = $jam;
            $model->logpulang_id = $log->logpresensi_id;

            if ($model->save()) {
                Yii::$app->session->setFlash('success', ucwords($siswa['nama']) . " " . $presensi_data['namakelas'] . " Presensi berhasil <b>" . $model->status_kehadiran . "</b> " . $presensi_data['jenispresensi']);
                return $this->redirect(['pulang', 'jenis' => $jenis]);
            }
        }

        return $this->render('pulang', compact('tanggal', 'pulangjadwal'));
    }

    public function ambilJadwal($hari, $jenispresensi)
    {
        $sql = "SELECT hari.hari_id, presensi_siswa_jadwal.kode_hari, jenispresensi, presensi_siswa_jadwal.jadwalpresensi_id, jadwal_masuk, jadwal_pulang, batas_awal_masuk, batas_akhir_masuk, batas_awal_pulang, batas_akhir_pulang,
            CASE 
                WHEN DATE_FORMAT(CURRENT_TIME, '%H:%i') >= DATE_FORMAT(batas_awal_masuk, '%H:%i') AND DATE_FORMAT(CURRENT_TIME, '%H:%i') <= DATE_FORMAT(batas_akhir_masuk, '%H:%i') THEN 'Tepat'
                WHEN DATE_FORMAT(CURRENT_TIME, '%H:%i') >= DATE_FORMAT(batas_akhir_masuk, '%H:%i') THEN 'Telat'
                WHEN DATE_FORMAT(CURRENT_TIME, '%H:%i') <= DATE_FORMAT(batas_awal_masuk, '%H:%i') THEN 'Belum'
            END AS 'keterangan_masuk',
            CASE 
                WHEN DATE_FORMAT(CURRENT_TIME, '%H:%i') >= DATE_FORMAT(batas_awal_pulang, '%H:%i') AND DATE_FORMAT(CURRENT_TIME, '%H:%i') <= DATE_FORMAT(batas_akhir_pulang, '%H:%i') THEN 'Tepat'
                WHEN DATE_FORMAT(CURRENT_TIME, '%H:%i') >= DATE_FORMAT(batas_akhir_pulang, '%H:%i') THEN 'Telat'
                WHEN DATE_FORMAT(CURRENT_TIME, '%H:%i') <= DATE_FORMAT(batas_awal_pulang, '%H:%i') THEN 'Belum'
            END AS 'keterangan_pulang'
            FROM presensi_siswa_jadwal
            LEFT JOIN hari ON hari.kodehari = presensi_siswa_jadwal.kode_hari
            INNER JOIN presensi_siswa_data ON presensi_siswa_data.jadwalpresensi_id = presensi_siswa_jadwal.jadwalpresensi_id
            WHERE hari_id = :hari_id AND isaktif = 1 AND presensi_siswa_jadwal.jenispresensi = :jenispresensi
            GROUP BY presensi_siswa_jadwal.jadwalpresensi_id";

        return Yii::$app->db->createCommand($sql, [':hari_id' => $hari, ':jenispresensi' => $jenispresensi])->queryAll();
    }

    // public function actionPulang()
    // {
    //     $nokartu = $this->request->post('nokartu');

    //     if ($this->request->isPost && $nokartu != null) {
    //         $daftar_hari = ['Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];
    //         $namahari = date('l');
    //         $namahari = $daftar_hari[$namahari];

    //         $tanggal = date('Y-m-d');

    //         $sql = "SELECT siswa.nis, siswa.nokartu, siswa.nama, siswa.foto, historykelas.kodeta, historykelas.kodekelas, kelas.namakelas
    //                 from siswa
    //                 inner join historykelas on siswa.nis = historykelas.nis
    //                 left join tahunajaran on historykelas.kodeta = tahunajaran.kodeta
    //                 left join kelas on historykelas.kodekelas = kelas.kodekelas
    //                 where tahunajaran.isaktif = 1 and siswa.nokartu = :nokartu";

    //         $siswa = Yii::$app->db->createCommand($sql)
    //             ->bindValue(':nokartu', $nokartu)
    //             ->queryOne();

    //         if ($siswa == null) {
    //             Yii::$app->session->setFlash('error', 'Data siswa tidak ditemukan.');
    //             return $this->redirect(['pulang', 'jenis' => $jenis]);
    //         }

    //         $jadwal = PresensiJadwal::find()->where(['jenis' => 'siswa', 'hari' => $namahari])->one();

    //         if ($jadwal == null) {
    //             Yii::$app->session->setFlash('error', 'Tidak ada jadwal presensi pada hari ini.');
    //             return $this->redirect(['pulang', 'jenis' => $jenis]);
    //         }

    //         // cek dulu apakah sudah pernah presensi
    //         $cekpresensi = PresensiData::find()->where(['nokartu' => $nokartu, 'tanggal' => $tanggal])->one();

    //         if ($cekpresensi == null) {
    //             $model = new PresensiData();
    //             $model->nis = $siswa['nis'];
    //             $model->kodeta = $siswa['kodeta'];
    //             $model->kodekelas = $siswa['kodekelas'];
    //             $model->nokartu = $siswa['nokartu'];
    //             $model->jenis = 'siswa';
    //             $model->tanggal = $tanggal;
    //             $model->jadwal_masuk = $jadwal->jadwal_masuk;
    //             $model->jadwal_pulang = $jadwal->jadwal_pulang;
    //         } else {
    //             $model = $cekpresensi;
    //         }

    //         // Hitung perbedaan waktu menit
    //         $model->presensi_pulang = date('H:i:s');

    //         $perbedaan_menit = $this->hitungPerbedaanWaktu($model->jadwal_pulang, $model->presensi_pulang);
    //         $model->diff_pulang = $perbedaan_menit;

    //         // echo '<pre>';
    //         // print_r($model->attributes);
    //         // echo '</pre>';
    //         // die;

    //         if ($model->save()) {
    //             if ($perbedaan_menit <= 0) {
    //                 Yii::$app->session->setFlash('warning', ucwords($siswa['nama']) . " " . $siswa['namakelas'] . " Presensi pulang berhasil.");
    //             } else {
    //                 Yii::$app->session->setFlash('success', ucwords($siswa['nama']) . " " . $siswa['namakelas'] . " Presensi pulang berhasil.");
    //             }

    //             return $this->redirect(['pulang', 'jenis' => $jenis]);
    //         }
    //     }

    //     return $this->render('pulang');
    // }

    /**
     * Displays a single PresensiSiswaData model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new PresensiSiswaData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PresensiSiswaData();

        if ($this->request->isPost) {
            if ($model->loadAll($this->request->post()) && $model->saveAll()) {
                Yii::$app->session->setFlash('success', "Data berhasil ditambahkan");
                return $this->redirect(['view', 'id' => $model->presensi_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PresensiSiswaData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            if ($model->loadAll($this->request->post()) && $model->saveAll()) {
                Yii::$app->session->setFlash('success', "Data berhasil diupdate");
                return $this->redirect(['view', 'id' => $model->presensi_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PresensiSiswaData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->deleteWithRelated();
        $result = $this->findModel($id)->delete();

        if ($result) {
            Yii::$app->session->setFlash('success', "Berhasil menghapus $result data.");
        } else {
            Yii::$app->session->setFlash('error', 'Gagal menghapus data.');
        }

        return $this->redirect(['index']);
    }


    /**
     * Finds the PresensiSiswaData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PresensiSiswaData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PresensiSiswaData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Data tidak ditemukan.');
        }
    }
}
