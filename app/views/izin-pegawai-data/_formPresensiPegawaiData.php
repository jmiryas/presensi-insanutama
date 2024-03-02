<div class="form-group" id="add-presensi-pegawai-data">
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
    'formName' => 'PresensiPegawaiData',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'presensi_id' => ['type' => TabularForm::INPUT_HIDDEN],
        'jadwalpresensi_id' => [
            'label' => 'Presensi pegawai jadwal',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiPegawaiJadwal::find()->orderBy('jadwalpresensi_id')->asArray()->all(), 'jadwalpresensi_id', 'jadwalpresensi_id'),
                'options' => ['placeholder' => 'Choose Presensi pegawai jadwal'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'pegawai_id' => ['type' => TabularForm::INPUT_TEXT],
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
        'cuti_id' => [
            'label' => 'Cuti pegawai data',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\base\CutiPegawaiData::find()->orderBy('cuti_id')->asArray()->all(), 'cuti_id', 'cuti_id'),
                'options' => ['placeholder' => 'Choose Cuti pegawai data'],
            ],
            'columnOptions' => ['width' => '200px']
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
            'label' => 'Presensi pegawai log',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiPegawaiLog::find()->orderBy('logpresensi_id')->asArray()->all(), 'logpresensi_id', 'logpresensi_id'),
                'options' => ['placeholder' => 'Choose Presensi pegawai log'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'logpulang_id' => [
            'label' => 'Presensi pegawai log',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiPegawaiLog::find()->orderBy('logpresensi_id')->asArray()->all(), 'logpresensi_id', 'logpresensi_id'),
                'options' => ['placeholder' => 'Choose Presensi pegawai log'],
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
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowPresensiPegawaiData(' . $key . '); return false;', 'id' => 'presensi-pegawai-data-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Presensi Pegawai Data', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowPresensiPegawaiData()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

