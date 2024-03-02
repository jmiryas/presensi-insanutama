<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PendidikanpegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-pendidikanpegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pendidikanpegawai_id')->textInput(['placeholder' => 'Pendidikanpegawai']) ?>

    <?= $form->field($model, 'pegawai_id')->textInput(['maxlength' => true, 'placeholder' => 'Pegawai']) ?>

    <?= $form->field($model, 'ket_pendidikan')->textInput(['maxlength' => true, 'placeholder' => 'Ket Pendidikan']) ?>

    <?= $form->field($model, 'jenjang')->dropDownList([ 'SMP' => 'SMP', 'SMA' => 'SMA', 'D2' => 'D2', 'D3' => 'D3', 'S1' => 'S1', 'S2' => 'S2', 'S3' => 'S3', 'KEPROFESIAN LAIN' => 'KEPROFESIAN LAIN', 'PESANTREN' => 'PESANTREN', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'is_aktif')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
