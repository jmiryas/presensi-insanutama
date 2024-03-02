<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\base\Pegawai */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'CutiPegawaiData', 
        'relID' => 'cuti-pegawai-data', 
        'value' => \yii\helpers\Json::encode($model->cutiPegawaiDatas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IzinPegawaiData', 
        'relID' => 'izin-pegawai-data', 
        'value' => \yii\helpers\Json::encode($model->izinPegawaiDatas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PresensiPegawaiLog', 
        'relID' => 'presensi-pegawai-log', 
        'value' => \yii\helpers\Json::encode($model->presensiPegawaiLogs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'pegawai_id')->textInput(['maxlength' => true, 'placeholder' => 'Pegawai']) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'placeholder' => 'Nik']) ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true, 'placeholder' => 'Nip']) ?>

    <?= $form->field($model, 'nama_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pegawai']) ?>

    <?= $form->field($model, 'jeniskelamin_id')->textInput(['maxlength' => true, 'placeholder' => 'Jeniskelamin']) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']) ?>

    <?= $form->field($model, 'tgl_lahir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Lahir',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat']) ?>

    <?= $form->field($model, 'status_kawin')->textInput(['maxlength' => true, 'placeholder' => 'Status Kawin']) ?>

    <?= $form->field($model, 'nama_pasangan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pasangan']) ?>

    <?= $form->field($model, 'sekolah_id')->textInput(['placeholder' => 'Sekolah']) ?>

    <?= $form->field($model, 'tmt')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tmt',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'statuspegawai_id')->textInput(['maxlength' => true, 'placeholder' => 'Statuspegawai']) ?>

    <?= $form->field($model, 'pangkatgolongan_id')->textInput(['placeholder' => 'Pangkatgolongan']) ?>

    <?= $form->field($model, 'pendidikanpegawai_id')->textInput(['placeholder' => 'Pendidikanpegawai']) ?>

    <?= $form->field($model, 'jurusan')->textInput(['maxlength' => true, 'placeholder' => 'Jurusan']) ?>

    <?= $form->field($model, 'nama_sekolah')->textInput(['maxlength' => true, 'placeholder' => 'Nama Sekolah']) ?>

    <?= $form->field($model, 'sertifikasi')->textInput(['maxlength' => true, 'placeholder' => 'Sertifikasi']) ?>

    <?= $form->field($model, 'status_inpasing')->textInput(['maxlength' => true, 'placeholder' => 'Status Inpasing']) ?>

    <?= $form->field($model, 'jenispegawai_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\base\Jenispegawai::find()->orderBy('jenispegawai_id')->asArray()->all(), 'jenispegawai_id', 'jenispegawai_id'),
        'options' => ['placeholder' => 'Choose Jenispegawai'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'tugas_tambahan')->textInput(['maxlength' => true, 'placeholder' => 'Tugas Tambahan']) ?>

    <?= $form->field($model, 'kaderisasi_nu')->textInput(['maxlength' => true, 'placeholder' => 'Kaderisasi Nu']) ?>

    <?= $form->field($model, 'foto_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Foto Pegawai']) ?>

    <?= $form->field($model, 'nokartu_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Nokartu Pegawai']) ?>

    <?= $form->field($model, 'pin_pegawai')->textInput(['maxlength' => true, 'placeholder' => 'Pin Pegawai']) ?>

    <?= $form->field($model, 'is_user')->checkbox() ?>

    <?= $form->field($model, 'kodeguru')->textInput(['maxlength' => true, 'placeholder' => 'Kodeguru']) ?>

    <?= $form->field($model, 'gaji_pokok')->textInput(['placeholder' => 'Gaji Pokok']) ?>

    <?= $form->field($model, 'jabatanstruktural_id')->textInput(['placeholder' => 'Jabatanstruktural']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('CutiPegawaiData'),
            'content' => $this->render('_formCutiPegawaiData', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->cutiPegawaiDatas),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('IzinPegawaiData'),
            'content' => $this->render('_formIzinPegawaiData', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->izinPegawaiDatas),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('PresensiPegawaiLog'),
            'content' => $this->render('_formPresensiPegawaiLog', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->presensiPegawaiLogs),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
