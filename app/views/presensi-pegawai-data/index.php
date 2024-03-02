<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\PresensiPegawaiDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use app\modules\UserManagement\components\GhostHtml;
use kartik\grid\GridView;

$this->title = 'Presensi Pegawai Data';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="presensi-pegawai-data-index panel panel-default">
    <div class="panel-body">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    
        <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
                'presensi_id',
            [
                'attribute' => 'jadwalpresensi_id',
                'label' => 'Jadwalpresensi',
                'value' => function($model){                   
                    return $model->jadwalpresensi->jadwalpresensi_id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiPegawaiJadwal::find()->asArray()->all(), 'jadwalpresensi_id', 'jadwalpresensi_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Presensi pegawai jadwal', 'id' => 'grid-presensi-pegawai-data-search-jadwalpresensi_id']
            ],
            'pegawai_id',
            'tgl',
            'hari',
            'status_berangkat',
            'status_pulang',
            [
                'attribute' => 'cuti_id',
                'label' => 'Cuti',
                'value' => function($model){
                    if ($model->cuti)
                    {return $model->cuti->cuti_id;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\CutiPegawaiData::find()->asArray()->all(), 'cuti_id', 'cuti_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Cuti pegawai data', 'id' => 'grid-presensi-pegawai-data-search-cuti_id']
            ],
            [
                'attribute' => 'izin_id',
                'label' => 'Izin',
                'value' => function($model){
                    if ($model->izin)
                    {return $model->izin->izin_id;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\IzinPegawaiData::find()->asArray()->all(), 'izin_id', 'izin_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Izin pegawai data', 'id' => 'grid-presensi-pegawai-data-search-izin_id']
            ],
            'jam_masuk',
            'jam_pulang',
            [
                'attribute' => 'logmasuk_id',
                'label' => 'Logmasuk',
                'value' => function($model){
                    if ($model->logmasuk)
                    {return $model->logmasuk->logpresensi_id;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiPegawaiLog::find()->asArray()->all(), 'logpresensi_id', 'logpresensi_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Presensi pegawai log', 'id' => 'grid-presensi-pegawai-data-search-logmasuk_id']
            ],
            [
                'attribute' => 'logpulang_id',
                'label' => 'Logpulang',
                'value' => function($model){
                    if ($model->logpulang)
                    {return $model->logpulang->logpresensi_id;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiPegawaiLog::find()->asArray()->all(), 'logpresensi_id', 'logpresensi_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Presensi pegawai log', 'id' => 'grid-presensi-pegawai-data-search-logpulang_id']
            ],
            'nokartu',
            'latitude',
            'longitude',
            'keterangan:ntext',
            'kodeta',
            'kodekelas',
            'generate_id',
            'created_at',
            'updated_at',
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
            <?= GhostHtml::a('<span class=\'glyphicon glyphicon-plus-sign\'></span> Tambah', ['/presensi-pegawai-data/create'], ['class' => 'btn btn-success']) ?>
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presensi-pegawai-data']],
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
