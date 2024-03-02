<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiSiswaData */

$this->title = 'Presensi Manual Siswa';
$this->params['breadcrumbs'][] = ['label' => 'Presensi Data Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-siswa-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="presensi-siswa-data-form">

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model); ?>

        <?php
        $model->tempvar = $model->nis . ' / ' . $model->nis0->nama;
        echo $form->field($model, 'tempvar')->staticInput()->label('Nis / Nama');
        ?>

        <?php
        $model->tempvar = $model->hari . ', ' . date('d-m-Y', strtotime($model->tgl));
        echo $form->field($model, 'tempvar')->staticInput()->label('Tanggal');
        ?>

        <?= $form->field($model, 'status_kehadiran')->dropDownList(['HADIR' => 'HADIR', 'IZIN' => 'IZIN', 'CUTI' => 'CUTI', 'SAKIT' => 'SAKIT',]) ?>

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