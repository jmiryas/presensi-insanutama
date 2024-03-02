<div class="form-group" id="add-historykelas">
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
    'formName' => 'Historykelas',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'kodehistory' => ['type' => TabularForm::INPUT_HIDDEN],
        'kodestatus' => ['type' => TabularForm::INPUT_TEXT],
        'kodekelas' => ['type' => TabularForm::INPUT_TEXT],
        'kodeta' => [
            'label' => 'Tahunajaran',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\base\Tahunajaran::find()->orderBy('kodeta')->asArray()->all(), 'kodeta', 'kodeta'),
                'options' => ['placeholder' => 'Choose Tahunajaran'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'isaktif' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ '0', '1', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Isaktif'],
                    ]
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowHistorykelas(' . $key . '); return false;', 'id' => 'historykelas-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Historykelas', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowHistorykelas()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

