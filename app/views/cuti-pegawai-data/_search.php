<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CutiPegawaiDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-cuti-pegawai-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cuti_id')->textInput(['placeholder' => 'Cuti']) ?>

    <?= $form->field($model, 'jeniscuti_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\base\CutiPegawaiJeniscuti::find()->orderBy('jeniscuti_id')->asArray()->all(), 'jeniscuti_id', 'jeniscuti_id'),
        'options' => ['placeholder' => 'Choose Cuti pegawai jeniscuti'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'pegawai_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\base\Pegawai::find()->orderBy('pegawai_id')->asArray()->all(), 'pegawai_id', 'pegawai_id'),
        'options' => ['placeholder' => 'Choose Pegawai'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'keterangan_cuti')->textInput(['maxlength' => true, 'placeholder' => 'Keterangan Cuti']) ?>

    <?= $form->field($model, 'domisili_cuti')->textInput(['maxlength' => true, 'placeholder' => 'Domisili Cuti']) ?>

    <?php /* echo $form->field($model, 'nohp')->textInput(['maxlength' => true, 'placeholder' => 'Nohp']) */ ?>

    <?php /* echo $form->field($model, 'tgl_pengajuancuti')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Pengajuancuti',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'tgl_awal')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Awal',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'tgl_tidak_cuti')->textInput(['maxlength' => true, 'placeholder' => 'Tgl Tidak Cuti']) */ ?>

    <?php /* echo $form->field($model, 'tgl_akhir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Akhir',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'tgl_setujuicuti')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Setujuicuti',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'jml_hari')->textInput(['placeholder' => 'Jml Hari']) */ ?>

    <?php /* echo $form->field($model, 'statuspengajuan_id')->textInput(['maxlength' => true, 'placeholder' => 'Statuspengajuan']) */ ?>

    <?php /* echo $form->field($model, 'pegawai_acc')->textInput(['maxlength' => true, 'placeholder' => 'Pegawai Acc']) */ ?>

    <?php /* echo $form->field($model, 'file_datadukung')->textInput(['maxlength' => true, 'placeholder' => 'File Datadukung']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
