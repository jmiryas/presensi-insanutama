<div class="form-group" id="add-presensi-siswa-data">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'PresensiSiswaData',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'presensi_id' => ['type' => TabularForm::INPUT_HIDDEN],
        'nis' => [
            'label' => 'Siswa',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\base\Siswa::find()->orderBy('nis')->asArray()->all(), 'nis', 'nis'),
                'options' => ['placeholder' => 'Choose Siswa'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'tgl' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Tgl',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'hari' => ['type' => TabularForm::INPUT_TEXT],
        'status_kehadiran' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'HADIR' => 'HADIR', 'IZIN' => 'IZIN', 'CUTI' => 'CUTI', 'SAKIT' => 'SAKIT', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Status Kehadiran'],
                    ]
        ],
        'jam_masuk' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Jam Masuk',
                        'autoclose' => true
                    ]
                ]
            ]
        ],
        'jam_pulang' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Jam Pulang',
                        'autoclose' => true
                    ]
                ]
            ]
        ],
        'logmasuk_id' => [
            'label' => 'Presensi siswa log',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiSiswaLog::find()->orderBy('logpresensi_id')->asArray()->all(), 'logpresensi_id', 'logpresensi_id'),
                'options' => ['placeholder' => 'Choose Presensi siswa log'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'logpulang_id' => [
            'label' => 'Presensi siswa log',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiSiswaLog::find()->orderBy('logpresensi_id')->asArray()->all(), 'logpresensi_id', 'logpresensi_id'),
                'options' => ['placeholder' => 'Choose Presensi siswa log'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'nokartu' => ['type' => TabularForm::INPUT_TEXT],
        'latitude' => ['type' => TabularForm::INPUT_TEXT],
        'longitude' => ['type' => TabularForm::INPUT_TEXT],
        'keterangan' => ['type' => TabularForm::INPUT_TEXTAREA],
        'kodeta' => ['type' => TabularForm::INPUT_TEXT],
        'kodekelas' => ['type' => TabularForm::INPUT_TEXT],
        'generate_id' => ['type' => TabularForm::INPUT_TEXT],
        'created_at' => ['type' => TabularForm::INPUT_TEXT],
        'updated_at' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowPresensiSiswaData(' . $key . '); return false;', 'id' => 'presensi-siswa-data-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Presensi Siswa Data', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowPresensiSiswaData()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

