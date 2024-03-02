<?php

namespace app\controllers;

use Yii;
use app\models\base\Hari;
use app\models\HariSearch;
use Codeception\Step\Retry;
use Codeception\Subscriber\PrepareTest;
use yii\base\DynamicModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class LaporanController extends Controller
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

    public function actionLaporanHarian()
    {
        $model = DynamicModel::validateData(['kodekelas', 'kodeta', 'tgl', 'jenispresensi'], [
            [['kodeta', 'kodekelas'], 'safe']
        ]);
        $model->addRule(['tgl', 'jenispresensi'], 'required');
        $model->tgl = date('Y-m-d');

        $data = [];

        if ($model->load($this->request->get())) {
            $model->tgl = date('Y-m-d', strtotime($model->tgl));

            // $sql = "SELECT presensi_pegawai_jadwal.jenispresensi, tahunajaran.namata, kelas.*, siswa.nama, presensi_siswa_data.* FROM presensi_siswa_data 
            // LEFT JOIN presensi_pegawai_jadwal ON presensi_pegawai_jadwal.jadwalpresensi_id = presensi_siswa_data.jadwalpresensi_id
            // LEFT JOIN siswa ON siswa.nis = presensi_siswa_data.nis
            // LEFT JOIN kelas ON kelas.kodekelas = presensi_siswa_data.kodekelas
            // LEFT JOIN tahunajaran ON tahunajaran.kodeta = presensi_siswa_data.kodeta
            // WHERE tgl = :tgl AND presensi_pegawai_jadwal.jenispresensi = :jenispresensi";

            $sql = "SELECT presensi_pegawai_jadwal.jenispresensi, pegawai.*, presensi_pegawai_data.* FROM presensi_pegawai_data
            LEFT JOIN presensi_pegawai_jadwal ON presensi_pegawai_jadwal.jadwalpresensi_id = presensi_pegawai_data.jadwalpresensi_id
            LEFT JOIN pegawai ON pegawai.pegawai_id = presensi_pegawai_data.pegawai_id
            WHERE tgl = :tgl AND  presensi_pegawai_jadwal.jenispresensi = :jenispresensi";

            $data = Yii::$app->db->createCommand($sql, [':tgl' => $model->tgl, ':jenispresensi' => $model->jenispresensi])->queryAll();
        }

        $model->tgl = date('d-m-Y', strtotime($model->tgl));
        return $this->render('laporan-harian', compact('model', 'data'));
    }

    public function actionLaporanBulanan()
    {
        $model = DynamicModel::validateData(['kodekelas', 'kodeta', 'bulan', 'tahun', 'jenispresensi'], [
            [['kodeta', 'kodekelas'], 'safe']
        ]);
        $model->addRule(['bulan', 'tahun', 'jenispresensi'], 'required');
        $model->bulan = date('m');
        $model->tahun = date('Y');

        $datasiswa = [];
        $datasebulan = [];
        $label_tanggalan = [];
        $label_jenispresensi = [];
        $datasumpresensi = [];

        if ($model->load($this->request->get())) {
            // $sql = "SELECT presensi_siswa_jadwal.jenispresensi, tahunajaran.namata, kelas.*, siswa.nama, presensi_siswa_data.* FROM presensi_siswa_data 
            //     LEFT JOIN presensi_siswa_jadwal ON presensi_siswa_jadwal.jadwalpresensi_id = presensi_siswa_data.jadwalpresensi_id
            //     LEFT JOIN siswa ON siswa.nis = presensi_siswa_data.nis
            //     LEFT JOIN kelas ON kelas.kodekelas = presensi_siswa_data.kodekelas
            //     LEFT JOIN tahunajaran ON tahunajaran.kodeta = presensi_siswa_data.kodeta
            //     WHERE MONTH(tgl) = :bulan AND YEAR(tgl) = :tahun AND presensi_siswa_jadwal.jenispresensi = :jenispresensi";

            $sql = "SELECT presensi_pegawai_jadwal.jenispresensi, pegawai.*, presensi_pegawai_data.* FROM presensi_pegawai_data 
                LEFT JOIN presensi_pegawai_jadwal ON presensi_pegawai_jadwal.jadwalpresensi_id = presensi_pegawai_data.jadwalpresensi_id
                LEFT JOIN pegawai ON pegawai.pegawai_id = presensi_pegawai_data.pegawai_id
                WHERE MONTH(tgl) = :bulan AND YEAR(tgl) = :tahun AND presensi_pegawai_jadwal.jenispresensi = :jenispresensi";

            $data = Yii::$app->db->createCommand($sql, [':bulan' => $model->bulan, ':tahun' => $model->tahun, ':jenispresensi' => $model->jenispresensi])->queryAll();

            // ambil siswa nya aja
            foreach ($data as $key => $value) {
                // $datasiswa[$value['nis'] . '-' . $value['kodeta']] = [
                //     'nis' => $value['nis'],
                //     'nama' => $value['nama'],
                //     'namakelas' => $value['namakelas'],
                //     'kodejenjang' => $value['kodejenjang'],
                //     'namata' => $value['namata'],
                //     'kodeta' => $value['kodeta'],
                //     'jenispresensi' => $value['jenispresensi'],
                // ];

                $datasiswa[$value['nik']] = [
                    'nik' => $value['nik'],
                    'nama_pegawai' => $value['nama_pegawai'],
                    'jeniskelamin_id' => $value['jeniskelamin_id'],
                    'jenispresensi' => $value['jenispresensi'],
                ];
            }

            // ambil data presensi dalam satu bulan

            foreach ($data as $value) {
                // $key = $value['nis'] . '-' . $value['kodeta'];

                $key = $value['nik'];

                $tanggal = date('d', strtotime($value['tgl']));

                // tambahkan status kehadiran tidak ada/null maka alpa
                // dan ubah status kehadiran menjadi lebih singkat
                $status_kehadiran = empty($value['status_kehadiran']) ? 'A' : substr($value['status_kehadiran'], 0, 1);

                $datasebulan[$key][$tanggal] = $status_kehadiran;

                // key disamakan dengan value agar unik
                $label_tanggalan[$tanggal] = $tanggal;
                $label_jenispresensi[$status_kehadiran] = $status_kehadiran;

                // value akan diincrement berdasarkan key dan status kehadiran
                if (isset($datasumpresensi[$key][$status_kehadiran])) {
                    $datasumpresensi[$key][$status_kehadiran] += 1;
                } else {
                    $datasumpresensi[$key][$status_kehadiran] = 1;
                }
            }

            // var_dump($datasumpresensi['3403011706690001']['A']);
            // die;

            ksort($label_tanggalan);

            foreach ($datasebulan as &$sub_array) {
                ksort($sub_array);
            }

            // var_dump($datasebulan);
            // var_dump($label_tanggalan);
            // die;
        }

        return $this->render('laporan-bulanan', compact('model', 'datasiswa', 'datasebulan', 'label_tanggalan', 'label_jenispresensi', 'datasumpresensi'));
    }
}
