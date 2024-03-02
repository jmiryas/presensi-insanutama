<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiSiswaData */

$this->title = $model->presensi_id;
$this->params['breadcrumbs'][] = ['label' => 'Presensi Siswa Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-siswa-data-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Presensi Siswa Data'  . Html::encode($this->title) ?></h2>

        <div>

            <?php // GhostHtml::a('Baru', ['/presensi-siswa-data/create'], ['class' => 'btn btn-success']) 
            ?>
            <?= GhostHtml::a('List', ['/presensi-siswa-data/index'], ['class' => 'btn btn-info']) ?>
            <?php // GhostHtml::a('Update', ['/presensi-siswa-data/update', 'id' => $model->presensi_id], ['class' => 'btn btn-primary']) 
            ?>
            <?php // GhostHtml::a('Delete', ['/presensi-siswa-data/delete', 'id' => $model->presensi_id], [
            //     'class' => 'btn btn-danger',
            //     'data' => [
            //         'confirm' => 'Are you sure you want to delete this item?',
            //         'method' => 'post',
            //     ],
            // ])
            ?>
        </div>
    </div>

    <?php
    $gridColumn = [
        'presensi_id',
        [
            'attribute' => 'jadwalpresensi.jadwalpresensi_id',
            'label' => 'Jadwalpresensi',
        ],
        [
            'attribute' => 'nis0.nis',
            'label' => 'Nis',
        ],
        'tgl',
        'hari',
        'status_kehadiran',
        'jam_masuk',
        'jam_pulang',
        [
            'attribute' => 'logmasuk.logpresensi_id',
            'label' => 'Logmasuk',
        ],
        [
            'attribute' => 'logpulang.logpresensi_id',
            'label' => 'Logpulang',
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
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
    ?>
    <br>
    <br>
    <h4>PresensiSiswaJadwal<?= ' ' . Html::encode($this->title) ?></h4>
    <?php
    $gridColumnPresensiSiswaJadwal = [
        'jenispresensi',
        'kode_hari',
        'jadwal_masuk',
        'jadwal_pulang',
        'batas_awal_masuk',
        'batas_akhir_masuk',
        'batas_awal_pulang',
        'batas_akhir_pulang',
        'isaktif',
        'created_at',
        'updated_at',
    ];
    echo DetailView::widget([
        'model' => $model->jadwalpresensi,
        'attributes' => $gridColumnPresensiSiswaJadwal
    ]);
    ?>
</div>