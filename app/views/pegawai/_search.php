<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pegawai_id')->textInput(['maxlength' => true, 'placeholder' => 'Pegawai']) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'placeholder' => 'Nik']) ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true, 'placeholder' => 'Nip']) ?>

    <?= $form->field($model, 'nama_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pegawai']) ?>

    <?= $form->field($model, 'jeniskelamin_id')->textInput(['maxlength' => true, 'placeholder' => 'Jeniskelamin']) ?>

    <?php /* echo $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) */ ?>

    <?php /* echo $form->field($model, 'tgl_lahir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Lahir',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat']) */ ?>

    <?php /* echo $form->field($model, 'status_kawin')->textInput(['maxlength' => true, 'placeholder' => 'Status Kawin']) */ ?>

    <?php /* echo $form->field($model, 'nama_pasangan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pasangan']) */ ?>

    <?php /* echo $form->field($model, 'sekolah_id')->textInput(['placeholder' => 'Sekolah']) */ ?>

    <?php /* echo $form->field($model, 'tmt')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tmt',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'statuspegawai_id')->textInput(['maxlength' => true, 'placeholder' => 'Statuspegawai']) */ ?>

    <?php /* echo $form->field($model, 'pangkatgolongan_id')->textInput(['placeholder' => 'Pangkatgolongan']) */ ?>

    <?php /* echo $form->field($model, 'pendidikanpegawai_id')->textInput(['placeholder' => 'Pendidikanpegawai']) */ ?>

    <?php /* echo $form->field($model, 'jurusan')->textInput(['maxlength' => true, 'placeholder' => 'Jurusan']) */ ?>

    <?php /* echo $form->field($model, 'nama_sekolah')->textInput(['maxlength' => true, 'placeholder' => 'Nama Sekolah']) */ ?>

    <?php /* echo $form->field($model, 'sertifikasi')->textInput(['maxlength' => true, 'placeholder' => 'Sertifikasi']) */ ?>

    <?php /* echo $form->field($model, 'status_inpasing')->textInput(['maxlength' => true, 'placeholder' => 'Status Inpasing']) */ ?>

    <?php /* echo $form->field($model, 'jenispegawai_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\base\Jenispegawai::find()->orderBy('jenispegawai_id')->asArray()->all(), 'jenispegawai_id', 'jenispegawai_id'),
        'options' => ['placeholder' => 'Choose Jenispegawai'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'tugas_tambahan')->textInput(['maxlength' => true, 'placeholder' => 'Tugas Tambahan']) */ ?>

    <?php /* echo $form->field($model, 'kaderisasi_nu')->textInput(['maxlength' => true, 'placeholder' => 'Kaderisasi Nu']) */ ?>

    <?php /* echo $form->field($model, 'foto_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Foto Pegawai']) */ ?>

    <?php /* echo $form->field($model, 'nokartu_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Nokartu Pegawai']) */ ?>

    <?php /* echo $form->field($model, 'pin_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Pin Pegawai']) */ ?>

    <?php /* echo $form->field($model, 'is_user')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'kodeguru')->textInput(['maxlength' => true, 'placeholder' => 'Kodeguru']) */ ?>

    <?php /* echo $form->field($model, 'gaji_pokok')->textInput(['placeholder' => 'Gaji Pokok']) */ ?>

    <?php /* echo $form->field($model, 'jabatanstruktural_id')->textInput(['placeholder' => 'Jabatanstruktural']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
