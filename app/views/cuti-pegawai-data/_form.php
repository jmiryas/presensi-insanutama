<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\base\CutiPegawaiData */
/* @var $form yii\widgets\ActiveForm */

// \mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
//     'viewParams' => [
//         'class' => 'CutiPegawaiDetail', 
//         'relID' => 'cuti-pegawai-detail', 
//         'value' => \yii\helpers\Json::encode($model->cutiPegawaiDetails),
//         'isNewRecord' => ($model->isNewRecord) ? 1 : 0
//     ]
// ]);
// \mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
//     'viewParams' => [
//         'class' => 'PresensiPegawaiData', 
//         'relID' => 'presensi-pegawai-data', 
//         'value' => \yii\helpers\Json::encode($model->presensiPegawaiDatas),
//         'isNewRecord' => ($model->isNewRecord) ? 1 : 0
//     ]
// ]);
?>

<div class="cuti-pegawai-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'jeniscuti_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\base\CutiPegawaiJeniscuti::find()->orderBy('jeniscuti_id')->asArray()->all(), 'jeniscuti_id', 'nama_jeniscuti'),
        'options' => ['placeholder' => 'Choose Cuti pegawai jeniscuti'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php
    if (Yii::$app->user->issuperadmin) {
        echo $form->field($model, 'pegawai_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\app\models\base\Pegawai::find()->orderBy('pegawai_id')->asArray()->all(), 'pegawai_id', 'nama_pegawai'),
            'options' => ['placeholder' => 'Choose Pegawai'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    }
    ?>

    <?= $form->field($model, 'keterangan_cuti')->textarea(['maxlength' => true, 'placeholder' => 'Keterangan Cuti']) ?>

    <?php // $form->field($model, 'domisili_cuti')->textInput(['maxlength' => true, 'placeholder' => 'Domisili Cuti']) 
    ?>

    <?= $form->field($model, 'nohp')->textInput(['maxlength' => true, 'placeholder' => 'Nohp']) ?>

    <?= $form->field($model, 'tgl_awal')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Awal',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'tgl_akhir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Akhir',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'tgl_tidak_cuti')->textInput(['maxlength' => true, 'placeholder' => 'Tgl Tidak Cuti']) ?>

    <?= $form->field($model, 'jml_hari')->textInput(['placeholder' => 'Jml Hari']) ?>

    <?= $form->field($model, 'file_datadukung')->fileInput(['maxlength' => true, 'placeholder' => 'File Datadukung', 'class' => 'form-control'])->label('File Data Dukung (jpg, png, pdf)') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>