<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\base\IzinPegawaiData */
/* @var $form kartik\form\ActiveForm */

$this->title = 'Ajukan Izin Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Ajukan Izin Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="izin-pegawai-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="izin-pegawai-data-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->errorSummary($model); ?>

        <div class="row">
            <div class="col-12 col-md-4">
                <?= $form->field($model, 'jenisizin_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\base\IzinPegawaiJenisizin::find()->orderBy('jenisizin_id')->asArray()->all(), 'jenisizin_id', 'nama_jenisizin'),
                    'options' => ['placeholder' => 'Choose Izin pegawai jenisizin'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>

            <div class="col-12 col-md-4">
                <?php
                echo $form->field($model, 'tgl_awal')->widget(DatePicker::classname(), [
                    'type' => DatePicker::TYPE_RANGE,
                    'attribute2' => 'tgl_akhir',
                    'pluginOptions' => [
                        'todayHighlight' => true,
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy'
                    ],
                ])->label('Tanggal Pengajuan Izin Awal dan Akhir');
                ?>
            </div>

            <div class="col-12 col-md-4">
                <?= $form->field($model, 'jml_hari')->textInput(['placeholder' => 'Jumlah hari izin', 'type' => 'number'])->label("Jumlah Hari Izin") ?>
            </div>
        </div>

        <?= $form->field($model, 'keterangan_izin')->textarea(['maxlength' => true, 'placeholder' => 'Keterangan Izin']) ?>

        <!-- <? // $form->field($model, 'bukti')->fileInput(['maxlength' => true, 'placeholder' => 'Bukti', 'class' => 'form-control']) 
                ?> -->

        <?php
        echo $form->field($model, 'bukti')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*,application/pdf'],
            'pluginOptions' => [
                'allowedFileExtensions' => ['jpg', 'jpeg', 'png', 'pdf'],
                'maxFileSize' => 1024,
            ]
        ]);
        ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>