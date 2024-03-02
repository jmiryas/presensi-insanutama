<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\base\Pendidikanpegawai */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="pendidikanpegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'ket_pendidikan')->textInput(['maxlength' => true, 'placeholder' => 'Ket Pendidikan']) ?>

    <?= $form->field($model, 'jenjang')->dropDownList(['SMP' => 'SMP', 'SMA' => 'SMA', 'D2' => 'D2', 'D3' => 'D3', 'S1' => 'S1', 'S2' => 'S2', 'S3' => 'S3', 'KEPROFESIAN LAIN' => 'KEPROFESIAN LAIN', 'PESANTREN' => 'PESANTREN',], ['prompt' => '']) ?>

    <?= $form->field($model, 'is_aktif')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>