<?php

namespace app\controllers;

use Yii;
use app\models\base\IzinPegawaiData;
use app\models\IzinPegawaiDataSearch;
use app\modules\UserManagement\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * IzinPegawaiDataController implements the CRUD actions for IzinPegawaiData model.
 */
class IzinPegawaiDataController extends Controller
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

    public function actionAjukanIzin()
    {
        $username = Yii::$app->user->username;

        $model = new IzinPegawaiData();

        $model->pegawai_id = $username;
        $model->tgl_pengajuanizin = date("Ymd");

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                $model->tgl_awal = date('Y-m-d', strtotime($model->tgl_awal));
                $model->tgl_akhir = date('Y-m-d', strtotime($model->tgl_akhir));

                $bukti = UploadedFile::getInstance($model, 'bukti');

                if (!empty($bukti)) {
                    $folderPath = 'uploaded_files/izin/';

                    $uniqueName = 'izin_' . date('YmdHis') . '_' . uniqid(5);

                    $imageName = $uniqueName . '.' . $bukti->extension;

                    var_dump($imageName);

                    $filePath = $folderPath . $imageName;

                    $bukti->saveAs(Yii::getAlias($filePath));

                    $model->bukti = $imageName;
                }

                $model->save();

                // var_dump($model);
                // var_dump($model->save());
                // var_dump($model->getFirstErrors());
                // die;

                return $this->redirect(['view', 'id' => $model->izin_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('pengajuan_izin', [
            'model' => $model,
        ]);
    }

    /**
     * Lists all IzinPegawaiData models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IzinPegawaiDataSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IzinPegawaiData model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerPresensiPegawaiData = new \yii\data\ArrayDataProvider([
            'allModels' => $model->presensiPegawaiDatas,
        ]);
        return $this->render('view', [
            'model' => $model,
            'providerPresensiPegawaiData' => $providerPresensiPegawaiData,
        ]);
    }

    /**
     * Creates a new IzinPegawaiData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IzinPegawaiData();

        if ($this->request->isPost) {
            if (User::hasRole('pegawai', false)) {
                $model->pegawai_id = Yii::$app->user->identity->username;
            }

            $model->tgl_pengajuancuti = date('Y-m-d');

            if ($model->loadAll($this->request->post()) && $model->saveAll()) {
                Yii::$app->session->setFlash('success', "Data berhasil ditambahkan");
                return $this->redirect(['view', 'id' => $model->izin_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing IzinPegawaiData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', "Data berhasil diupdate");
                return $this->redirect(['view', 'id' => $model->izin_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing IzinPegawaiData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
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
     * Finds the IzinPegawaiData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinPegawaiData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IzinPegawaiData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Data tidak ditemukan.');
        }
    }

    /**
     * Action to load a tabular form grid
     * for PresensiPegawaiData
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddPresensiPegawaiData()
    {
        if ($this->request->isAjax) {
            $row = $this->request->post('PresensiPegawaiData');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if (($this->request->post('isNewRecord') && $this->request->post('_action') == 'load' && empty($row)) || $this->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPresensiPegawaiData', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
