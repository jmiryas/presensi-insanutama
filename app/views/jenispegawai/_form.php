<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\base\Jenispegawai */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="jenispegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'jenispegawai_id')->textInput(['maxlength' => true, 'placeholder' => 'Jenispegawai']) ?>

    <?= $form->field($model, 'nama_jenispegawai')->textInput(['maxlength' => true, 'placeholder' => 'Nama Jenispegawai']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>