<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PresensiSiswaLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-presensi-siswa-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'logpresensi_id')->textInput(['placeholder' => 'Logpresensi']) ?>

    <?= $form->field($model, 'waktu')->textInput(['placeholder' => 'Waktu']) ?>

    <?= $form->field($model, 'nis')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\base\Siswa::find()->orderBy('nis')->asArray()->all(), 'nis', 'nis'),
        'options' => ['placeholder' => 'Choose Siswa'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'nokartu')->textInput(['maxlength' => true, 'placeholder' => 'Nokartu']) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true, 'placeholder' => 'Latitude']) ?>

    <?php /* echo $form->field($model, 'longitude')->textInput(['maxlength' => true, 'placeholder' => 'Longitude']) */ ?>

    <?php /* echo $form->field($model, 'jarakpresensi')->textInput(['maxlength' => true, 'placeholder' => 'Jarakpresensi']) */ ?>

    <?php /* echo $form->field($model, 'kodeta')->textInput(['placeholder' => 'Kodeta']) */ ?>

    <?php /* echo $form->field($model, 'kodekelas')->textInput(['maxlength' => true, 'placeholder' => 'Kodekelas']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
