<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiSiswaData */

$this->title = 'Presensi Manual Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Presensi Data Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-pegawai-data-create">

    <h5><?= Html::encode($this->title . ' ' . $nama) ?></h5>

    <div class="presensi-pegawai-data-form">

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'status_berangkat')->dropDownList(['HADIR' => 'HADIR', 'IZIN' => 'IZIN', 'CUTI' => 'CUTI', 'SAKIT' => 'SAKIT',]) ?>

        <?= $form->field($model, 'status_pulang')->dropDownList(['HADIR' => 'HADIR', 'IZIN' => 'IZIN', 'CUTI' => 'CUTI', 'SAKIT' => 'SAKIT',]) ?>

        <?= $form->field($model, 'jam_masuk')->widget(\kartik\datecontrol\DateControl::className(), [
            'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
            'saveFormat' => 'php:H:i:s',
            'ajaxConversion' => true,
            'displayFormat' => 'php:H:i',
            'options' => [
                'pluginOptions' => [
                    // 'showMeridian' => false,
                    'placeholder' => 'Choose Jam Masuk',
                    'autoclose' => true
                ]
            ]
        ]); ?>

        <?= $form->field($model, 'jam_pulang')->widget(\kartik\datecontrol\DateControl::className(), [
            'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
            'saveFormat' => 'php:H:i:s',
            'ajaxConversion' => true,
            'displayFormat' => 'php:H:i',
            'options' => [
                'pluginOptions' => [
                    // 'showMeridian' => false,
                    'placeholder' => 'Choose Jam Pulang',
                    'autoclose' => true
                ]
            ]
        ]); ?>

        <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

        <?php
        // $model->jam_pulang = !empty($model->jam_pulang);
        // echo $form->field($model, 'jam_pulang')->checkbox();
        ?>

        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>