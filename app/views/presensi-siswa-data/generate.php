<?php

use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiSiswaData */

$this->title = 'Generate Data Presensi Siswa';
$this->params['breadcrumbs'][] = ['label' => 'Presensi Siswa Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="presensi-siswa-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-info" role="alert">
        <!-- <h4 class="alert-heading">Alert Heading</h4> -->
        <p>Jika data presensi sudah pernah digenerate ketika dilakukan generate ulang maka data yang sudah ada tidak akan dibuat ulang.</p>
        <!-- <hr /> -->
        <!-- <p class="mb-0">Alert Description</p> -->
    </div>
    <div class="card">
        <div class="card-body">

            <?php
            $form = ActiveForm::begin([
                'id' => 'login-form-inline',
                // 'type' => ActiveForm::TYPE_INLINE,
                'formConfig' => ['showLabels' => true],
                'fieldConfig' => ['options' => ['class' => 'form-group mr-2 me-2']] // spacing form field groups
            ]);
            ?>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'kodekelas')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => array_merge(['-all' => 'All'], \yii\helpers\ArrayHelper::map(\app\models\base\Kelas::find()->orderBy('kodejenjang')->asArray()->all(), 'kodekelas', 'namakelas')),
                        'options' => ['placeholder' => 'Choose Kelas'],
                        'pluginOptions' => [
                            // 'width' => '200px'
                        ],
                    ]); ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'jenispresensi')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(Yii::$app->db->createCommand("SELECT DISTINCT jenispresensi FROM presensi_siswa_jadwal")->queryAll(), 'jenispresensi', 'jenispresensi'),
                        'options' => ['placeholder' => 'Choose Jenis Presensi'],
                        'pluginOptions' => [
                            // 'width' => '200px'
                        ],
                    ]); ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'kodeta')->dropDownList(
                        \yii\helpers\ArrayHelper::map(\app\models\base\Tahunajaran::find()->orderBy('kodeta')->asArray()->all(), 'kodeta', 'namata')
                    ); ?>
                </div>
                <!-- <div class="col-md-2">
                    <?php
                    // $form->field($model, 'bulan')->dropDownList([
                    //     1 => 'Januari',
                    //     2 => 'Februari',
                    //     3 => 'Maret',
                    //     4 => 'April',
                    //     5 => 'Mei',
                    //     6 => 'Juni',
                    //     7 => 'Juli',
                    //     8 => 'Agustus',
                    //     9 => 'September',
                    //     10 => 'Oktober',
                    //     11 => 'November',
                    //     12 => 'Desember',
                    //]);  
                    ?>
                </div> -->
                <div class="col-md-4">
                    <?php
                    // echo >widget(DatePicker::className(), [
                    //     'type' => DatePicker::TYPE_RANGE,
                    //     'name2' => 'todate',
                    //     // 'value2' => '27-Feb-1996',
                    //     'pluginOptions' => [
                    //         'autoclose' => true,
                    //         'format' => 'yyyy-mm-dd'
                    //     ]
                    // ]);
                    // echo DatePicker::widget([
                    //     'name' => 'date_range_start',
                    //     'name2' => 'date_range_end',
                    //     'type' => DatePicker::TYPE_RANGE,
                    //     'pluginOptions' => [
                    //         'autoclose' => true,
                    //         'format' => 'yyyy-mm-dd',
                    //     ],
                    // ]); 
                    echo $form->field($model, 'tglawal')->widget(DatePicker::classname(), [
                        'type' => DatePicker::TYPE_RANGE,
                        'attribute2' => 'tglakhir',
                        'pluginOptions' => [
                            'todayHighlight' => true,
                            'autoclose' => true,
                            'format' => 'dd-mm-yyyy'
                        ],
                    ])->label('Tanggal awal dan akhir');
                    ?>

                </div>
            </div>

            <div class="form-group mb-0">
                <?php
                echo Html::submitButton('Proses', ['class' => 'btn btn-primary mr-1']);
                echo Html::a('Reset', ['generate'], ['class' => 'btn btn-danger']);
                ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>