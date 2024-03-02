<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\base\Siswa */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Historykelas', 
        'relID' => 'historykelas', 
        'value' => \yii\helpers\Json::encode($model->historykelas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PresensiSiswaData', 
        'relID' => 'presensi-siswa-data', 
        'value' => \yii\helpers\Json::encode($model->presensiSiswaDatas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PresensiSiswaLog', 
        'relID' => 'presensi-siswa-log', 
        'value' => \yii\helpers\Json::encode($model->presensiSiswaLogs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="siswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'nis')->textInput(['maxlength' => true, 'placeholder' => 'Nis']) ?>

    <?= $form->field($model, 'idasalsekolah')->textInput(['placeholder' => 'Idasalsekolah']) ?>

    <?= $form->field($model, 'kodejk')->textInput(['placeholder' => 'Kodejk']) ?>

    <?= $form->field($model, 'kodejeniskeringanan')->textInput(['maxlength' => true, 'placeholder' => 'Kodejeniskeringanan']) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

    <?= $form->field($model, 'panggilan')->textInput(['maxlength' => true, 'placeholder' => 'Panggilan']) ?>

    <?= $form->field($model, 'tempatlahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempatlahir']) ?>

    <?= $form->field($model, 'tgllahir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgllahir',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'tahunmasuk')->textInput(['maxlength' => true, 'placeholder' => 'Tahunmasuk']) ?>

    <?= $form->field($model, 'namabapak')->textInput(['maxlength' => true, 'placeholder' => 'Namabapak']) ?>

    <?= $form->field($model, 'namaibu')->textInput(['maxlength' => true, 'placeholder' => 'Namaibu']) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat']) ?>

    <?= $form->field($model, 'notelpon')->textInput(['maxlength' => true, 'placeholder' => 'Notelpon']) ?>

    <?= $form->field($model, 'namaori')->textInput(['maxlength' => true, 'placeholder' => 'Namaori']) ?>

    <?= $form->field($model, 'templatefinger')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nokartu')->textInput(['maxlength' => true, 'placeholder' => 'Nokartu']) ?>

    <?= $form->field($model, 'kelas_id')->textInput(['maxlength' => true, 'placeholder' => 'Kelas']) ?>

    <?= $form->field($model, 'longit')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'latit')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'adress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pin')->textInput(['maxlength' => true, 'placeholder' => 'Pin']) ?>

    <?= $form->field($model, 'kamar_id')->textInput(['maxlength' => true, 'placeholder' => 'Kamar']) ?>

    <?= $form->field($model, 'profil')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kamar')->textInput(['maxlength' => true, 'placeholder' => 'Kamar']) ?>

    <?= $form->field($model, 'asrama')->textInput(['maxlength' => true, 'placeholder' => 'Asrama']) ?>

    <?= $form->field($model, 'lokasi_asrama')->textInput(['maxlength' => true, 'placeholder' => 'Lokasi Asrama']) ?>

    <?= $form->field($model, 'kodeAsrama')->textInput(['maxlength' => true, 'placeholder' => 'KodeAsrama']) ?>

    <?= $form->field($model, 'status_ketua_kamar')->checkbox() ?>

    <?= $form->field($model, 'tgl_mapping')->textInput(['maxlength' => true, 'placeholder' => 'Tgl Mapping']) ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true, 'placeholder' => 'Foto']) ?>

    <?= $form->field($model, 'nisn')->textInput(['maxlength' => true, 'placeholder' => 'Nisn']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Historykelas'),
            'content' => $this->render('_formHistorykelas', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->historykelas),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('PresensiSiswaData'),
            'content' => $this->render('_formPresensiSiswaData', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->presensiSiswaDatas),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('PresensiSiswaLog'),
            'content' => $this->render('_formPresensiSiswaLog', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->presensiSiswaLogs),
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
