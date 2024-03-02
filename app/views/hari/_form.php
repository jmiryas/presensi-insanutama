<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\base\Hari */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="hari-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'kodehari')->textInput(['maxlength' => true, 'placeholder' => 'Kodehari']) ?>

    <?= $form->field($model, 'namahari')->textInput(['maxlength' => true, 'placeholder' => 'Namahari']) ?>

    <?= $form->field($model, 'nourut')->textInput(['placeholder' => 'Nourut']) ?>

    <?= $form->field($model, 'hari_id')->textInput(['placeholder' => 'Hari']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>