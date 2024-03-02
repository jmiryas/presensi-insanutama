<div class="form-group" id="add-cuti-pegawai-data">
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
    'formName' => 'CutiPegawaiData',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'cuti_id' => ['type' => TabularForm::INPUT_HIDDEN],
        'jeniscuti_id' => [
            'label' => 'Cuti pegawai jeniscuti',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\base\CutiPegawaiJeniscuti::find()->orderBy('jeniscuti_id')->asArray()->all(), 'jeniscuti_id', 'jeniscuti_id'),
                'options' => ['placeholder' => 'Choose Cuti pegawai jeniscuti'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'keterangan_cuti' => ['type' => TabularForm::INPUT_TEXT],
        'domisili_cuti' => ['type' => TabularForm::INPUT_TEXT],
        'nohp' => ['type' => TabularForm::INPUT_TEXT],
        'tgl_pengajuancuti' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Tgl Pengajuancuti',
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
        'tgl_tidak_cuti' => ['type' => TabularForm::INPUT_TEXT],
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
        'tgl_setujuicuti' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Tgl Setujuicuti',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'jml_hari' => ['type' => TabularForm::INPUT_TEXT],
        'statuspengajuan_id' => ['type' => TabularForm::INPUT_TEXT],
        'pegawai_acc' => ['type' => TabularForm::INPUT_TEXT],
        'file_datadukung' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowCutiPegawaiData(' . $key . '); return false;', 'id' => 'cuti-pegawai-data-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Cuti Pegawai Data', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowCutiPegawaiData()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

