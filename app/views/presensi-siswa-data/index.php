<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\PresensiSiswaDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use app\modules\UserManagement\components\GhostHtml;
use kartik\grid\GridView;

$this->title = 'Presensi Siswa Data';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
$this->params['useContainer'] = false;
?>
<div class="presensi-siswa-data-index panel panel-default">
    <div class="panel-body">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="search-form" style="display:none">
            <?= $this->render('_search', ['model' => $searchModel]); ?>
        </div>

        <?php
        $gridColumn = [
            ['class' => 'yii\grid\SerialColumn'],
            'presensi_id',
            [
                'attribute' => 'jadwalpresensi_id',
                'label' => 'Jadwalpresensi',
                'value' => function ($model) {
                    return $model->jadwalpresensi->jadwalpresensi_id;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiSiswaJadwal::find()->asArray()->all(), 'jadwalpresensi_id', 'jadwalpresensi_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Presensi siswa jadwal', 'id' => 'grid-presensi-siswa-data-search-jadwalpresensi_id']
            ],
            [
                'attribute' => 'nis',
                'label' => 'Nis',
                'value' => function ($model) {
                    return $model->nis0->nis;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\Siswa::find()->asArray()->all(), 'nis', 'nis'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Siswa', 'id' => 'grid-presensi-siswa-data-search-nis']
            ],
            'nis0.nama',
            'tgl',
            // 'hari',
            'status_kehadiran',
            'jam_masuk',
            'jam_pulang',
            /* 
                [
                'attribute' => 'logmasuk_id',
                'label' => 'Logmasuk',
                'value' => function ($model) {
                    if ($model->logmasuk) {
                        return $model->logmasuk->logpresensi_id;
                    } else {
                        return NULL;
                    }
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiSiswaLog::find()->asArray()->all(), 'logpresensi_id', 'logpresensi_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Presensi siswa log', 'id' => 'grid-presensi-siswa-data-search-logmasuk_id']
                ],
                [
                    'attribute' => 'logpulang_id',
                    'label' => 'Logpulang',
                    'value' => function ($model) {
                        if ($model->logpulang) {
                            return $model->logpulang->logpresensi_id;
                        } else {
                            return NULL;
                        }
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\PresensiSiswaLog::find()->asArray()->all(), 'logpresensi_id', 'logpresensi_id'),
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => 'Presensi siswa log', 'id' => 'grid-presensi-siswa-data-search-logpulang_id']
                ], 
            */
            'nokartu',
            // 'latitude',
            // 'longitude',
            'keterangan:ntext',
            // 'kodeta',
            'kodekelas',
            // 'generate_id',
            // 'created_at',
            // 'updated_at',
            // [
            //     'format' => 'raw',
            //     'value' => function ($model) {
            //         return GhostHtml::a('Manual', ['presensi-siswa-data/manual', 'id' => $model->presensi_id]);
            //     }
            // ],
            [
                'class' => 'yii\grid\ActionColumn',
                'icons' => [
                    'eye-open' => "<span class='glyphicon glyphicon-search flip-icon'></span>"
                ],
                'contentOptions' => ['class' => 'nowrap text-center'],
                'template' => '{view}'
            ],
        ];

        ?>

        <div class="d-flex justify-content-between mb-4">
            <div>
                <?php // GhostHtml::a('<span class=\'glyphicon glyphicon-plus-sign\'></span> Tambah', ['/presensi-siswa-data/create'], ['class' => 'btn btn-success']) 
                ?>
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
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presensi-siswa-data']],
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