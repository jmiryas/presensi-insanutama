<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HariSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-hari-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kodehari')->textInput(['maxlength' => true, 'placeholder' => 'Kodehari']) ?>

    <?= $form->field($model, 'namahari')->textInput(['maxlength' => true, 'placeholder' => 'Namahari']) ?>

    <?= $form->field($model, 'nourut')->textInput(['placeholder' => 'Nourut']) ?>

    <?= $form->field($model, 'hari_id')->textInput(['placeholder' => 'Hari']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
