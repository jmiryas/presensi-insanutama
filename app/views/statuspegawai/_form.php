<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\Statuspegawai */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="statuspegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'statuspegawai_id')->textInput(['maxlength' => true, 'placeholder' => 'Statuspegawai']) ?>

    <?= $form->field($model, 'statuspegawai')->textInput(['maxlength' => true, 'placeholder' => 'Statuspegawai']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>