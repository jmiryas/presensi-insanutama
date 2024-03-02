<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\base\IzinPegawaiData */
/* @var $form kartik\form\ActiveForm */

?>

<div class="izin-pegawai-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'jenisizin_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\base\IzinPegawaiJenisizin::find()->orderBy('jenisizin_id')->asArray()->all(), 'jenisizin_id', 'nama_jenisizin'),
        'options' => ['placeholder' => 'Choose Izin pegawai jenisizin'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php
    if (Yii::$app->user->issuperadmin) {
        echo $form->field($model, 'pegawai_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\app\models\base\Pegawai::find()->orderBy('pegawai_id')->asArray()->all(), 'pegawai_id', 'nama_pegawai'),
            'options' => ['placeholder' => 'Choose Pegawai'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    } ?>

    <?= $form->field($model, 'keterangan_izin')->textInput(['maxlength' => true, 'placeholder' => 'Keterangan Izin']) ?>

    <?= $form->field($model, 'tgl_awal')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Awal',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'tgl_izin')->textInput(['maxlength' => true, 'placeholder' => 'Tgl Izin']) ?>

    <?= $form->field($model, 'tgl_akhir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Akhir',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'jml_hari')->textInput(['placeholder' => 'Jml Hari']) ?>

    <?= $form->field($model, 'bukti')->fileInput(['maxlength' => true, 'placeholder' => 'Bukti', 'class' => 'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>