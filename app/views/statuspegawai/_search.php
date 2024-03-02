<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StatuspegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-statuspegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'statuspegawai_id')->textInput(['maxlength' => true, 'placeholder' => 'Statuspegawai']) ?>

    <?= $form->field($model, 'statuspegawai')->textInput(['maxlength' => true, 'placeholder' => 'Statuspegawai']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
