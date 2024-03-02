<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiSiswaJadwal */

$this->title = $model->jadwalpresensi_id;
$this->params['breadcrumbs'][] = ['label' => 'Presensi Siswa Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-siswa-jadwal-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Presensi Siswa Jadwal'  . Html::encode($this->title) ?></h2>

        <div>
                                    
            <?= GhostHtml::a('Baru', ['/presensi-siswa-jadwal/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/presensi-siswa-jadwal/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/presensi-siswa-jadwal/update', 'id' => $model->jadwalpresensi_id], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/presensi-siswa-jadwal/delete', 'id' => $model->jadwalpresensi_id], [
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
            'jadwalpresensi_id',
        'jenispresensi',
        [
            'attribute' => 'kodeHari.kodehari',
            'label' => 'Kode Hari',
        ],
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
    'model' => $model,
    'attributes' => $gridColumn
    ]);
    ?>
    <br>
                            <?php
                if($providerPresensiSiswaData->totalCount){
                $gridColumnPresensiSiswaData = [
                ['class' => 'yii\grid\SerialColumn'],
                            'presensi_id',
                        [
                'attribute' => 'nis0.nis',
                'label' => 'Nis'
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
                                <br>
            <h4>Hari<?= ' '. Html::encode($this->title) ?></h4>
            <?php 
            $gridColumnHari = [
                    'kodehari',
        'namahari',
        'nourut',
        'hari_id',
            ];
            echo DetailView::widget([
            'model' => $model->kodeHari,
            'attributes' => $gridColumnHari            ]);
            ?>
            </div>