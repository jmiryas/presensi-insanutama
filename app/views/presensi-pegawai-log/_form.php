<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiPegawaiLog */
/* @var $form kartik\form\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PresensiPegawaiData', 
        'relID' => 'presensi-pegawai-data', 
        'value' => \yii\helpers\Json::encode($model->presensiPegawaiDatas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="presensi-pegawai-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'logpresensi_id')->textInput(['placeholder' => 'Logpresensi']) ?>

    <?= $form->field($model, 'waktu')->textInput(['placeholder' => 'Waktu']) ?>

    <?= $form->field($model, 'pegawai_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\base\Pegawai::find()->orderBy('pegawai_id')->asArray()->all(), 'pegawai_id', 'pegawai_id'),
        'options' => ['placeholder' => 'Choose Pegawai'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'nokartu')->textInput(['maxlength' => true, 'placeholder' => 'Nokartu']) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true, 'placeholder' => 'Latitude']) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true, 'placeholder' => 'Longitude']) ?>

    <?= $form->field($model, 'jarakpresensi')->textInput(['maxlength' => true, 'placeholder' => 'Jarakpresensi']) ?>

    <?= $form->field($model, 'kodeta')->textInput(['placeholder' => 'Kodeta']) ?>

    <?= $form->field($model, 'kodekelas')->textInput(['maxlength' => true, 'placeholder' => 'Kodekelas']) ?>

    <?= $form->field($model, 'jenispresensi')->textInput(['maxlength' => true, 'placeholder' => 'Jenispresensi']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('PresensiPegawaiData'),
            'content' => $this->render('_formPresensiPegawaiData', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->presensiPegawaiDatas),
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
