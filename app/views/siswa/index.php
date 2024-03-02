<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\SiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use app\modules\UserManagement\components\GhostHtml;
use kartik\grid\GridView;

$this->title = 'Siswa';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="siswa-index panel panel-default">
    <div class="panel-body">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="search-form" style="display:none">
            <?= $this->render('_search', ['model' => $searchModel]); ?>
        </div>

        <?php
        $gridColumn = [
            ['class' => 'yii\grid\SerialColumn'],
            'nis',
            // 'idasalsekolah',
            [
                'attribute' => 'kodejk',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->kodejk == '1') {
                        return 'L';
                    } else if ($model->kodejk == '2') {
                        return 'P';
                    } else {
                        return '<i class="text-danger">(not set)</i>';
                    }
                }
            ],
            'nama',
            // 'panggilan',
            // 'tempatlahir',
            // 'tgllahir',
            // 'namabapak',
            // 'namaibu',
            // 'alamat',
            // 'notelpon',
            // 'namaori',
            // 'templatefinger:ntext',
            'nokartu',
            // 'kelas_id',
            // 'longit:ntext',
            // 'latit:ntext',
            // 'adress:ntext',
            // 'pin',
            // 'kamar_id',
            // 'profil:ntext',
            // 'kamar',
            // 'asrama',
            // 'lokasi_asrama',
            // 'kodeAsrama',
            // 'status_ketua_kamar',
            // 'tgl_mapping',
            'foto',
            // 'nisn',
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
                <?= GhostHtml::a('<span class=\'glyphicon glyphicon-plus-sign\'></span> Tambah', ['/siswa/create'], ['class' => 'btn btn-success']) ?>
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
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-siswa']],
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