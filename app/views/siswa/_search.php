<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SiswaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-siswa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nis')->textInput(['maxlength' => true, 'placeholder' => 'Nis']) ?>

    <?= $form->field($model, 'idasalsekolah')->textInput(['placeholder' => 'Idasalsekolah']) ?>

    <?= $form->field($model, 'kodejk')->textInput(['placeholder' => 'Kodejk']) ?>

    <?= $form->field($model, 'kodejeniskeringanan')->textInput(['maxlength' => true, 'placeholder' => 'Kodejeniskeringanan']) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

    <?php /* echo $form->field($model, 'panggilan')->textInput(['maxlength' => true, 'placeholder' => 'Panggilan']) */ ?>

    <?php /* echo $form->field($model, 'tempatlahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempatlahir']) */ ?>

    <?php /* echo $form->field($model, 'tgllahir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgllahir',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'tahunmasuk')->textInput(['maxlength' => true, 'placeholder' => 'Tahunmasuk']) */ ?>

    <?php /* echo $form->field($model, 'namabapak')->textInput(['maxlength' => true, 'placeholder' => 'Namabapak']) */ ?>

    <?php /* echo $form->field($model, 'namaibu')->textInput(['maxlength' => true, 'placeholder' => 'Namaibu']) */ ?>

    <?php /* echo $form->field($model, 'alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat']) */ ?>

    <?php /* echo $form->field($model, 'notelpon')->textInput(['maxlength' => true, 'placeholder' => 'Notelpon']) */ ?>

    <?php /* echo $form->field($model, 'namaori')->textInput(['maxlength' => true, 'placeholder' => 'Namaori']) */ ?>

    <?php /* echo $form->field($model, 'templatefinger')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'nokartu')->textInput(['maxlength' => true, 'placeholder' => 'Nokartu']) */ ?>

    <?php /* echo $form->field($model, 'kelas_id')->textInput(['maxlength' => true, 'placeholder' => 'Kelas']) */ ?>

    <?php /* echo $form->field($model, 'longit')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'latit')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'adress')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'pin')->textInput(['maxlength' => true, 'placeholder' => 'Pin']) */ ?>

    <?php /* echo $form->field($model, 'kamar_id')->textInput(['maxlength' => true, 'placeholder' => 'Kamar']) */ ?>

    <?php /* echo $form->field($model, 'profil')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'kamar')->textInput(['maxlength' => true, 'placeholder' => 'Kamar']) */ ?>

    <?php /* echo $form->field($model, 'asrama')->textInput(['maxlength' => true, 'placeholder' => 'Asrama']) */ ?>

    <?php /* echo $form->field($model, 'lokasi_asrama')->textInput(['maxlength' => true, 'placeholder' => 'Lokasi Asrama']) */ ?>

    <?php /* echo $form->field($model, 'kodeAsrama')->textInput(['maxlength' => true, 'placeholder' => 'KodeAsrama']) */ ?>

    <?php /* echo $form->field($model, 'status_ketua_kamar')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'tgl_mapping')->textInput(['maxlength' => true, 'placeholder' => 'Tgl Mapping']) */ ?>

    <?php /* echo $form->field($model, 'foto')->textInput(['maxlength' => true, 'placeholder' => 'Foto']) */ ?>

    <?php /* echo $form->field($model, 'nisn')->textInput(['maxlength' => true, 'placeholder' => 'Nisn']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
