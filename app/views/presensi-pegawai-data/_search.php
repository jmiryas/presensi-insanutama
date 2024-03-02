<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PresensiPegawaiDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-presensi-pegawai-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'presensi_id')->textInput(['placeholder' => 'Presensi']) ?>

    <?= $form->field($model, 'jadwalpresensi_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiPegawaiJadwal::find()->orderBy('jadwalpresensi_id')->asArray()->all(), 'jadwalpresensi_id', 'jadwalpresensi_id'),
        'options' => ['placeholder' => 'Choose Presensi pegawai jadwal'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'pegawai_id')->textInput(['maxlength' => true, 'placeholder' => 'Pegawai']) ?>

    <?= $form->field($model, 'tgl')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'hari')->textInput(['maxlength' => true, 'placeholder' => 'Hari']) ?>

    <?php /* echo $form->field($model, 'status_berangkat')->dropDownList([ 'HADIR' => 'HADIR', 'IZIN' => 'IZIN', 'CUTI' => 'CUTI', 'SAKIT' => 'SAKIT', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'status_pulang')->dropDownList([ 'HADIR' => 'HADIR', 'IZIN' => 'IZIN', 'CUTI' => 'CUTI', 'SAKIT' => 'SAKIT', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'cuti_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\base\CutiPegawaiData::find()->orderBy('cuti_id')->asArray()->all(), 'cuti_id', 'cuti_id'),
        'options' => ['placeholder' => 'Choose Cuti pegawai data'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'izin_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\base\IzinPegawaiData::find()->orderBy('izin_id')->asArray()->all(), 'izin_id', 'izin_id'),
        'options' => ['placeholder' => 'Choose Izin pegawai data'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'jam_masuk')->widget(\kartik\datecontrol\DateControl::className(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
        'saveFormat' => 'php:H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Jam Masuk',
                'autoclose' => true
            ]
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'jam_pulang')->widget(\kartik\datecontrol\DateControl::className(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
        'saveFormat' => 'php:H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Jam Pulang',
                'autoclose' => true
            ]
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'logmasuk_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiPegawaiLog::find()->orderBy('logpresensi_id')->asArray()->all(), 'logpresensi_id', 'logpresensi_id'),
        'options' => ['placeholder' => 'Choose Presensi pegawai log'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'logpulang_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiPegawaiLog::find()->orderBy('logpresensi_id')->asArray()->all(), 'logpresensi_id', 'logpresensi_id'),
        'options' => ['placeholder' => 'Choose Presensi pegawai log'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'nokartu')->textInput(['maxlength' => true, 'placeholder' => 'Nokartu']) */ ?>

    <?php /* echo $form->field($model, 'latitude')->textInput(['maxlength' => true, 'placeholder' => 'Latitude']) */ ?>

    <?php /* echo $form->field($model, 'longitude')->textInput(['maxlength' => true, 'placeholder' => 'Longitude']) */ ?>

    <?php /* echo $form->field($model, 'keterangan')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'kodeta')->textInput(['placeholder' => 'Kodeta']) */ ?>

    <?php /* echo $form->field($model, 'kodekelas')->textInput(['maxlength' => true, 'placeholder' => 'Kodekelas']) */ ?>

    <?php /* echo $form->field($model, 'generate_id')->textInput(['maxlength' => true, 'placeholder' => 'Generate']) */ ?>

    <?php /* echo $form->field($model, 'created_at')->textInput(['placeholder' => 'Created At']) */ ?>

    <?php /* echo $form->field($model, 'updated_at')->textInput(['placeholder' => 'Updated At']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
