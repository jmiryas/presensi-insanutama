<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\IzinPegawaiDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\base\Pegawai;
use yii\helpers\Html;
use kartik\export\ExportMenu;
use app\modules\UserManagement\components\GhostHtml;
use kartik\grid\GridView;

$this->title = 'Izin Pegawai Data';
$this->params['breadcrumbs'][] = $this->title;
$this->params['useContainer'] = false;

$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="izin-pegawai-data-index panel panel-default">
    <div class="panel-body">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="search-form" style="display:none">
            <?= $this->render('_search', ['model' => $searchModel]); ?>
        </div>

        <?php
        $gridColumn = [
            ['class' => 'yii\grid\SerialColumn'],
            // 'izin_id',
            [
                'attribute' => 'jenisizin_id',
                'value' => function ($model) {
                    return $model->jenisizin->nama_jenisizin;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\IzinPegawaiJenisizin::find()->asArray()->all(), 'jenisizin_id', 'nama_jenisizin'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Izin pegawai jenisizin', 'id' => 'grid-izin-pegawai-data-search-jenisizin_id']
            ],
            // [
            //     'attribute' => 'pegawai_id',
            //     'value' => function ($model) {
            //         if ($model->pegawai) {
            //             return "({$model->pegawai_id}) " . $model->pegawai->nama_pegawai;
            //         } else {
            //             return NULL;
            //         }
            //     },
            //     'filterType' => GridView::FILTER_SELECT2,
            //     'filter' => \yii\helpers\ArrayHelper::map(Pegawai::find()->select(['pegawai_id, concat("(", pegawai_id, ") ", nama_pegawai) as nama_pegawai'])->asArray()->all(), 'pegawai_id', 'nama_pegawai'),
            //     'filterWidgetOptions' => [
            //         'pluginOptions' => [
            //             'allowClear' => true,
            //             'width' => '200px'
            //         ],
            //     ],
            //     'filterInputOptions' => ['placeholder' => 'Pegawai', 'id' => 'grid-izin-pegawai-data-search-pegawai_id']
            // ],
            'keterangan_izin',
            'tgl_pengajuanizin',
            'tgl_awal',
            // 'tgl_izin',
            'tgl_akhir',
            // 'tgl_setujuiizin',
            'jml_hari',
            [
                'attribute' => 'pegawai_acc',
                'label' => 'Pegawai Acc',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->pegawaiAcc) {
                        return $model->pegawaiAcc->nama_pegawai;
                    } else {
                        return Html::tag("span", "Dalam peninjauan", [
                            'class' => 'text-primary font-weight-bold font-italic'
                        ]);
                    }
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\Pegawai::find()->asArray()->all(), 'pegawai_id', 'pegawai_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Pegawai', 'id' => 'grid-izin-pegawai-data-search-pegawai_acc']
            ],
            // 'bukti',
            // [
            //     'attribute' => 'statuspengajuan_id',
            //     'label' => 'Statuspengajuan',
            //     'value' => function ($model) {
            //         if ($model->statuspengajuan) {
            //             return $model->statuspengajuan->ket_statuspengajuan;
            //         } else {
            //             return NULL;
            //         }
            //     },
            //     'filterType' => GridView::FILTER_SELECT2,
            //     'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\Statuspengajuan::find()->asArray()->all(), 'statuspengajuan_id', 'statuspengajuan_id'),
            //     'filterWidgetOptions' => [
            //         'pluginOptions' => ['allowClear' => true],
            //     ],
            //     'filterInputOptions' => ['placeholder' => 'Statuspengajuan', 'id' => 'grid-izin-pegawai-data-search-statuspengajuan_id']
            // ],
            [
                'attribute' => 'statuspengajuan_id',
                'label' => 'Statuspengajuan',
                'format' => 'raw', // Menggunakan format raw
                'value' => function ($model) {
                    $statuspengajuan = $model->statuspengajuan ? $model->statuspengajuan->ket_statuspengajuan : null;
                    return $statuspengajuan; // Tidak perlu div wrapper di sini
                },
                'contentOptions' => function ($model) {
                    $background = '';

                    // Menentukan warna latar belakang berdasarkan statuspengajuan_id
                    switch ($model->statuspengajuan->statuspengajuan_id) {
                        case 'Diproses':
                            $background = 'bg-warning text-white font-weight-bold text-center';
                            break;
                        case 'Diacc':
                            $background = 'bg-success text-white font-weight-bold text-center';
                            break;
                        default:
                            $background = 'bg-danger text-white font-weight-bold text-center';
                    }

                    return ['class' => $background]; // Mengatur style sesuai dengan warna latar belakang yang sesuai
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\base\Statuspengajuan::find()->asArray()->all(), 'statuspengajuan_id', 'statuspengajuan_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Statuspengajuan', 'id' => 'grid-izin-pegawai-data-search-statuspengajuan_id']
            ],

            // 'created_at',
            // 'updated_at',
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
                <?= GhostHtml::a('<span class=\'glyphicon glyphicon-plus-sign\'></span> Tambah', ['/izin-pegawai-data/create'], ['class' => 'btn btn-success']) ?>

                <?= GhostHtml::a('<span class=\'glyphicon glyphicon-plus-sign\'></span> Ajukan Izin', ['/izin-pegawai-data/ajukan-izin'], ['class' => 'btn btn-primary']) ?>

                <!-- <? // Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) 
                        ?> -->
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
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pegawai-data']],
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