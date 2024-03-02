<div class="form-group" id="add-izin-pegawai-data">
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
    'formName' => 'IzinPegawaiData',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'izin_id' => ['type' => TabularForm::INPUT_HIDDEN],
        'jenisizin_id' => [
            'label' => 'Izin pegawai jenisizin',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\base\IzinPegawaiJenisizin::find()->orderBy('jenisizin_id')->asArray()->all(), 'jenisizin_id', 'jenisizin_id'),
                'options' => ['placeholder' => 'Choose Izin pegawai jenisizin'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'keterangan_izin' => ['type' => TabularForm::INPUT_TEXT],
        'tgl_pengajuanizin' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Tgl Pengajuanizin',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'tgl_awal' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Tgl Awal',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'tgl_izin' => ['type' => TabularForm::INPUT_TEXT],
        'tgl_akhir' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Tgl Akhir',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'tgl_setujuiizin' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Tgl Setujuiizin',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'jml_hari' => ['type' => TabularForm::INPUT_TEXT],
        'pegawai_acc' => ['type' => TabularForm::INPUT_TEXT],
        'bukti' => ['type' => TabularForm::INPUT_TEXT],
        'statuspengajuan_id' => [
            'label' => 'Izin pegawai statuspengajuan',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\base\IzinPegawaiStatuspengajuan::find()->orderBy('statuspengajuan_id')->asArray()->all(), 'statuspengajuan_id', 'statuspengajuan_id'),
                'options' => ['placeholder' => 'Choose Izin pegawai statuspengajuan'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowIzinPegawaiData(' . $key . '); return false;', 'id' => 'izin-pegawai-data-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Izin Pegawai Data', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinPegawaiData()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

