<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiPegawaiJadwal */

$this->title = $model->jadwalpresensi_id;
$this->params['breadcrumbs'][] = ['label' => 'Presensi Pegawai Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-pegawai-jadwal-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Presensi Pegawai Jadwal'  . Html::encode($this->title) ?></h2>

        <div>
                                    
            <?= GhostHtml::a('Baru', ['/presensi-pegawai-jadwal/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/presensi-pegawai-jadwal/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/presensi-pegawai-jadwal/update', 'id' => $model->jadwalpresensi_id], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/presensi-pegawai-jadwal/delete', 'id' => $model->jadwalpresensi_id], [
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
        [
            'attribute' => 'jenispegawai.jenispegawai_id',
            'label' => 'Jenispegawai',
        ],
        [
            'attribute' => 'jenispresensi0.jenispresensi',
            'label' => 'Jenispresensi',
        ],
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
                if($providerPresensiPegawaiData->totalCount){
                $gridColumnPresensiPegawaiData = [
                ['class' => 'yii\grid\SerialColumn'],
                            'presensi_id',
                        'pegawai_id',
            'tgl',
            'hari',
            'status_berangkat',
            'status_pulang',
            [
                'attribute' => 'cuti.cuti_id',
                'label' => 'Cuti'
            ],
            [
                'attribute' => 'izin.izin_id',
                'label' => 'Izin'
            ],
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
                'dataProvider' => $providerPresensiPegawaiData,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presensi-pegawai-data']],
                'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Presensi Pegawai Data'),
                ],
                                    'export' => false,
                                'columns' => $gridColumnPresensiPegawaiData
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
                                <br>
            <h4>PresensiPegawaiJenispresensi<?= ' '. Html::encode($this->title) ?></h4>
            <?php 
            $gridColumnPresensiPegawaiJenispresensi = [
                        ];
            echo DetailView::widget([
            'model' => $model->jenispresensi0,
            'attributes' => $gridColumnPresensiPegawaiJenispresensi            ]);
            ?>
                                <br>
            <h4>Jenispegawai<?= ' '. Html::encode($this->title) ?></h4>
            <?php 
            $gridColumnJenispegawai = [
                    'nama_jenispegawai',
            ];
            echo DetailView::widget([
            'model' => $model->jenispegawai,
            'attributes' => $gridColumnJenispegawai            ]);
            ?>
            </div>