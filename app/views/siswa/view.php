<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\Siswa */

$this->title = $model->nis;
$this->params['breadcrumbs'][] = ['label' => 'Siswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Siswa'  . Html::encode($this->title) ?></h2>

        <div>
            <?= GhostHtml::a('Baru', ['/siswa/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/siswa/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/siswa/update', 'id' => $model->nis], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/siswa/delete', 'id' => $model->nis], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <?php
    $gridColumn = [
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
        // 'kodejeniskeringanan',
        'nama',
        'panggilan',
        'tempatlahir',
        'tgllahir',
        // 'tahunmasuk',
        'namabapak',
        'namaibu',
        'alamat',
        'notelpon',
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
        'nisn',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
    ?>
    <br>
    <?php
    if ($providerHistorykelas->totalCount) {
        $gridColumnHistorykelas = [
            ['class' => 'yii\grid\SerialColumn'],
            'kodehistory',
            'kodestatus',
            'kodekelas',
            [
                'attribute' => 'kodeta0.kodeta',
                'label' => 'Kodeta'
            ],
            'isaktif',
        ];
        echo Gridview::widget([
            'dataProvider' => $providerHistorykelas,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-historykelas']],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Historykelas'),
            ],
            'export' => false,
            'columns' => $gridColumnHistorykelas
        ]);
    }
    ?>
    <br>
    <?php
    if ($providerPresensiSiswaData->totalCount) {
        $gridColumnPresensiSiswaData = [
            ['class' => 'yii\grid\SerialColumn'],
            'presensi_id',
            [
                'attribute' => 'jadwalpresensi.jadwalpresensi_id',
                'label' => 'Jadwalpresensi'
            ],
            'tgl',
            'hari',
            'status_kehadiran',
            'jam_masuk',
            'jam_pulang',
            [
                'attribute' => 'logmasuk.logpresensi_id',
                'label' => 'Logmasuk'
            ],
            [
                'attribute' => 'logpulang.logpresensi_id',
                'label' => 'Logpulang'
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
        ];
        echo Gridview::widget([
            'dataProvider' => $providerPresensiSiswaData,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presensi-siswa-data']],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Presensi Siswa Data'),
            ],
            'export' => false,
            'columns' => $gridColumnPresensiSiswaData
        ]);
    }
    ?>
    <?php
    if ($providerPresensiSiswaLog->totalCount) {
        $gridColumnPresensiSiswaLog = [
            ['class' => 'yii\grid\SerialColumn'],
            'logpresensi_id',
            'waktu',
            'nokartu',
            'latitude',
            'longitude',
            'jarakpresensi',
            'kodeta',
            'kodekelas',
        ];
        echo Gridview::widget([
            'dataProvider' => $providerPresensiSiswaLog,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presensi-siswa-log']],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Presensi Siswa Log'),
            ],
            'export' => false,
            'columns' => $gridColumnPresensiSiswaLog
        ]);
    }
    ?>
</div>