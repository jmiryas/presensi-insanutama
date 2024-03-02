<?php

namespace app\modules\api\controllers;

use Flight;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class DefaultController extends Controller
{
    public function actionIndex()
    {
        Flight::route('/', function () {
            $data = \app\models\base\PresensiSiswaJadwal::find()->all();
            return Flight::json($data);
        });

        Flight::start();
        // return $this->asJson([
        //     'tes' => '123456'
        // ]);
    }

    public function actionOne($idx)
    {
        return $this->asJson([
            'tes' => $idx
        ]);
    }
}
