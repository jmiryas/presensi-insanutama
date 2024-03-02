<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\CutiPegawaiDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\base\Pegawai;
use yii\helpers\Html;
use kartik\export\ExportMenu;
use app\modules\UserManagement\components\GhostHtml;
use kartik\grid\GridView;

$this->title = 'Cuti Pegawai Data';
$this->params['breadcrumbs'][] = $this->title;
$this->params['useContainer'] = false;

$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="cuti-pegawai-data-index panel panel-default">
    <div class="panel-body">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="search-form" style="display:none">
            <?= $this->render('_search', ['model' => $searchModel]); ?>
        </div>

        <?php
        $gridColumn = [
            ['class' => 'yii\grid\SerialColumn'],
            // 'cuti_id',
            [
                'attribute' => 'jeniscuti_id',
                'value' => function ($model) {
                    return $model->jeniscuti->nama_jeniscuti;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\CutiPegawaiJeniscuti::find()->asArray()->all(), 'jeniscuti_id', 'nama_jeniscuti'),
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'allowClear' => true,
                        'width' => '100px'
                    ],

                ],
                'filterInputOptions' => ['placeholder' => 'Cuti pegawai jeniscuti', 'id' => 'grid-cuti-pegawai-data-search-jeniscuti_id']
            ],
            [
                'attribute' => 'pegawai_id',
                'value' => function ($model) {
                    if ($model->pegawai) {
                        return "({$model->pegawai_id}) " . $model->pegawai->nama_pegawai;
                    } else {
                        return NULL;
                    }
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(Pegawai::find()->select(['pegawai_id, concat("(", pegawai_id, ") ", nama_pegawai) as nama_pegawai'])->asArray()->all(), 'pegawai_id', 'nama_pegawai'),
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'allowClear' => true,
                        'width' => '200px'
                    ],
                ],
                'filterInputOptions' => ['placeholder' => 'Pegawai', 'id' => 'grid-cuti-pegawai-data-search-pegawai_id']
            ],
            'keterangan_cuti',
            // 'domisili_cuti',
            'nohp',
            'tgl_pengajuancuti',
            'tgl_awal',
            'tgl_tidak_cuti',
            'tgl_akhir',
            // 'tgl_setujuicuti',
            'jml_hari',
            'statuspengajuan_id',
            // 'pegawai_acc',
            // 'file_datadukung',
            [
                'class' => 'yii\grid\ActionColumn',
                'icons' => [
                    'eye-open' => "<span class='glyphicon glyphicon-search flip-icon'></span>"
                ],
                'contentOptions' => ['class' => 'nowrap text-center'],
            ],
        ];

        ?>

        <div class="d-flex justify-content-between mb-4">
            <div>
                <?= GhostHtml::a('<span class=\'glyphicon glyphicon-plus-sign\'></span> Tambah', ['/cuti-pegawai-data/create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
            </div>
            <?= ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Export',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Pilih format dibawah</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_EXCEL => false,
                    ExportMenu::FORMAT_PDF => false,
                    ExportMenu::FORMAT_CSV => [
                        'icon' => 'glyphicon glyphicon-floppy-open',
                    ],
                    ExportMenu::FORMAT_EXCEL_X => [
                        'label' => 'Excel 2007+ (xlsx)',
                        'icon' =>  'glyphicon glyphicon-floppy-remove',
                        'iconOptions' => ['class' => 'text-success'],
                        'alertMsg' => 'The EXCEL 2007+ (xlsx) export file will be generated for download.',
                    ]
                ]
            ]);
            ?>
        </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $gridColumn,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-cuti-pegawai-data']],
            'layout' => '{toolbar}{items}<div class="row"><div class="col-sm-8">{pager}</div><div class="col-sm-4 text-right">{summary}',
            'responsiveWrap' => false,
            'pager' => [
                'options' => ['class' => 'pagination pagination-sm'],
                'hideOnSinglePage' => true,
                'lastPageLabel' => 'Last',
                'firstPageLabel' => 'First',
            ],
            'export' => false,
            // your toolbar can include the additional full export menu
            'toolbar' => [
                '{export}',
            ],
        ]); ?>

    </div>
</div>