<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiSiswaLog */

$this->title = $model->logpresensi_id;
$this->params['breadcrumbs'][] = ['label' => 'Presensi Siswa Log', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-siswa-log-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Presensi Siswa Log'  . Html::encode($this->title) ?></h2>

        <div>

            <?php // GhostHtml::a('Baru', ['/presensi-siswa-log/create'], ['class' => 'btn btn-success']) 
            ?>
            <?= GhostHtml::a('List', ['/presensi-siswa-log/index'], ['class' => 'btn btn-info']) ?>
            <?php // GhostHtml::a('Update', ['/presensi-siswa-log/update', 'id' => $model->logpresensi_id], ['class' => 'btn btn-primary']) 
            ?>
            <?php // GhostHtml::a('Delete', ['/presensi-siswa-log/delete', 'id' => $model->logpresensi_id], [
            // 'class' => 'btn btn-danger',
            // 'data' => [
            //     'confirm' => 'Are you sure you want to delete this item?',
            //     'method' => 'post',
            // ],
            // ])
            ?>
        </div>
    </div>

    <?php
    $gridColumn = [
        'logpresensi_id',
        'waktu',
        [
            'attribute' => 'nis0.nis',
            'label' => 'Nis',
        ],
        'nokartu',
        // 'latitude',
        // 'longitude',
        // 'jarakpresensi',
        'kodeta',
        'kodekelas',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
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
            [
                'attribute' => 'nis0.nis',
                'label' => 'Nis'
            ],
            'tgl',
            'hari',
            'status_kehadiran',
            'jam_masuk',
            'jam_pulang',
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
    <br>
    <h4>Siswa<?= ' ' . Html::encode($this->title) ?></h4>
    <?php
    $gridColumnSiswa = [
        'idasalsekolah',
        'kodejk',
        'kodejeniskeringanan',
        'nama',
        'panggilan',
        'tempatlahir',
        'tgllahir',
        'tahunmasuk',
        'namabapak',
        'namaibu',
        'alamat',
        'notelpon',
        'namaori',
        'templatefinger',
        'nokartu',
        'kelas_id',
        'longit',
        'latit',
        'adress',
        'pin',
        'kamar_id',
        'profil',
        'kamar',
        'asrama',
        'lokasi_asrama',
        'kodeAsrama',
        'status_ketua_kamar',
        'tgl_mapping',
        'foto',
        'nisn',
    ];
    echo DetailView::widget([
        'model' => $model->nis0,
        'attributes' => $gridColumnSiswa
    ]);
    ?>
</div>