<?php

namespace app\controllers;

use Yii;
use app\models\base\CutiPegawaiData;
use app\models\CutiPegawaiDataSearch;
use app\modules\UserManagement\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CutiPegawaiDataController implements the CRUD actions for CutiPegawaiData model.
 */
class CutiPegawaiDataController extends Controller
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
     * Lists all CutiPegawaiData models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CutiPegawaiDataSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CutiPegawaiData model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerCutiPegawaiDetail = new \yii\data\ArrayDataProvider([
            'allModels' => $model->cutiPegawaiDetails,
        ]);
        $providerPresensiPegawaiData = new \yii\data\ArrayDataProvider([
            'allModels' => $model->presensiPegawaiDatas,
        ]);
        return $this->render('view', [
            'model' => $model,
            'providerCutiPegawaiDetail' => $providerCutiPegawaiDetail,
            'providerPresensiPegawaiData' => $providerPresensiPegawaiData,
        ]);
    }

    /**
     * Creates a new CutiPegawaiData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CutiPegawaiData();

        if ($this->request->isPost) {
            if (User::hasRole('pegawai', false)) {
                $model->pegawai_id = Yii::$app->user->identity->username;
            }

            $model->tgl_pengajuancuti = date('Y-m-d');

            if ($model->loadAll($this->request->post()) && $model->saveAll()) {
                Yii::$app->session->setFlash('success', "Data berhasil ditambahkan");
                return $this->redirect(['view', 'id' => $model->cuti_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CutiPegawaiData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            if ($model->loadAll($this->request->post()) && $model->saveAll()) {
                Yii::$app->session->setFlash('success', "Data berhasil diupdate");
                return $this->redirect(['view', 'id' => $model->cuti_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CutiPegawaiData model.
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
     * Finds the CutiPegawaiData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CutiPegawaiData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CutiPegawaiData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Data tidak ditemukan.');
        }
    }

    /**
     * Action to load a tabular form grid
     * for CutiPegawaiDetail
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddCutiPegawaiDetail()
    {
        if ($this->request->isAjax) {
            $row = $this->request->post('CutiPegawaiDetail');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if (($this->request->post('isNewRecord') && $this->request->post('_action') == 'load' && empty($row)) || $this->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formCutiPegawaiDetail', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
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
