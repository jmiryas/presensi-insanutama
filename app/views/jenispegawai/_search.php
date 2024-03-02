<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JenispegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-jenispegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'jenispegawai_id')->textInput(['maxlength' => true, 'placeholder' => 'Jenispegawai']) ?>

    <?= $form->field($model, 'nama_jenispegawai')->textInput(['maxlength' => true, 'placeholder' => 'Nama Jenispegawai']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
