<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiPegawaiLog */

$this->title = $model->logpresensi_id;
$this->params['breadcrumbs'][] = ['label' => 'Presensi Pegawai Log', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-pegawai-log-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Presensi Pegawai Log'  . Html::encode($this->title) ?></h2>

        <div>
                                    
            <?= GhostHtml::a('Baru', ['/presensi-pegawai-log/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/presensi-pegawai-log/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/presensi-pegawai-log/update', 'id' => $model->logpresensi_id], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/presensi-pegawai-log/delete', 'id' => $model->logpresensi_id], [
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
            'logpresensi_id',
        'waktu',
        [
            'attribute' => 'pegawai.pegawai_id',
            'label' => 'Pegawai',
        ],
        'nokartu',
        'latitude',
        'longitude',
        'jarakpresensi',
        'kodeta',
        'kodekelas',
        'jenispresensi',
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
            [
                'attribute' => 'jadwalpresensi.jadwalpresensi_id',
                'label' => 'Jadwalpresensi'
            ],
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
            <h4>Pegawai<?= ' '. Html::encode($this->title) ?></h4>
            <?php 
            $gridColumnPegawai = [
                    'nik',
        'nip',
        'nama_pegawai',
        'jeniskelamin_id',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'status_kawin',
        'nama_pasangan',
        'sekolah_id',
        'tmt',
        'statuspegawai_id',
        'pangkatgolongan_id',
        'pendidikanpegawai_id',
        'jurusan',
        'nama_sekolah',
        'sertifikasi',
        'status_inpasing',
        'jenispegawai_id',
        'tugas_tambahan',
        'kaderisasi_nu',
        'foto_pegawai',
        'nokartu_pegawai',
        'pin_pegawai',
        'is_user',
        'kodeguru',
        'gaji_pokok',
        'jabatanstruktural_id',
            ];
            echo DetailView::widget([
            'model' => $model->pegawai,
            'attributes' => $gridColumnPegawai            ]);
            ?>
            </div>