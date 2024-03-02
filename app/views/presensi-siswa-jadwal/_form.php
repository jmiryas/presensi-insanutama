<?php

use app\models\base\PresensiSiswaJenispresensi;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiSiswaJadwal */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="presensi-siswa-jadwal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'jadwalpresensi_id')->textInput() ?>

    <?= $form->field($model, 'jenispresensi')->dropDownList(\yii\helpers\ArrayHelper::map(PresensiSiswaJenispresensi::find()->asArray()->all(), 'jenispresensi', 'jenispresensi'), ['maxlength' => true, 'placeholder' => 'Jenispresensi']) ?>

    <?= $form->field($model, 'kode_hari')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\base\Hari::find()->orderBy('kodehari')->asArray()->all(), 'kodehari', 'kodehari'),
        ['options' => ['placeholder' => 'Choose Hari']]
    ); ?>


    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'jadwal_masuk')->widget(\kartik\datecontrol\DateControl::className(), [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'displayFormat' => 'php:H:i',
                'options' => [
                    'pluginOptions' => [
                        // 'showMeridian' => false,
                        'placeholder' => 'Choose Jadwal Masuk',
                        'autoclose' => true
                    ]
                ]
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'batas_awal_masuk')->widget(\kartik\datecontrol\DateControl::className(), [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'displayFormat' => 'php:H:i',
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Batas Awal Masuk',
                        'autoclose' => true
                    ]
                ]
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'batas_akhir_masuk')->widget(\kartik\datecontrol\DateControl::className(), [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'displayFormat' => 'php:H:i',
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Batas Akhir Masuk',
                        'autoclose' => true
                    ]
                ]
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'jadwal_pulang')->widget(\kartik\datecontrol\DateControl::className(), [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'displayFormat' => 'php:H:i',
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Jadwal Pulang',
                        'autoclose' => true
                    ]
                ]
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'batas_awal_pulang')->widget(\kartik\datecontrol\DateControl::className(), [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'displayFormat' => 'php:H:i',
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Batas Awal Pulang',
                        'autoclose' => true
                    ]
                ]
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'batas_akhir_pulang')->widget(\kartik\datecontrol\DateControl::className(), [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'displayFormat' => 'php:H:i',
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Batas Akhir Pulang',
                        'autoclose' => true
                    ]
                ]
            ]); ?>
        </div>
    </div>

    <?= $form->field($model, 'isaktif')->dropDownList(['1' => 'Ya', '0' => 'Tidak'], ['placeholder' => 'Isaktif']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>