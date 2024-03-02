<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IzinPegawaiJenisizinSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-izin-pegawai-jenisizin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'jenisizin_id')->textInput(['placeholder' => 'Jenisizin']) ?>

    <?= $form->field($model, 'nama_jenisizin')->textInput(['maxlength' => true, 'placeholder' => 'Nama Jenisizin']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
