<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiPegawaiData */

$this->title = $model->presensi_id;
$this->params['breadcrumbs'][] = ['label' => 'Presensi Pegawai Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-pegawai-data-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Presensi Pegawai Data'  . Html::encode($this->title) ?></h2>

        <div>
                                    
            <?= GhostHtml::a('Baru', ['/presensi-pegawai-data/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/presensi-pegawai-data/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/presensi-pegawai-data/update', 'id' => $model->presensi_id], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/presensi-pegawai-data/delete', 'id' => $model->presensi_id], [
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
            'presensi_id',
        [
            'attribute' => 'jadwalpresensi.jadwalpresensi_id',
            'label' => 'Jadwalpresensi',
        ],
        'pegawai_id',
        'tgl',
        'hari',
        'status_berangkat',
        'status_pulang',
        [
            'attribute' => 'cuti.cuti_id',
            'label' => 'Cuti',
        ],
        [
            'attribute' => 'izin.izin_id',
            'label' => 'Izin',
        ],
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
            <h4>PresensiPegawaiJadwal<?= ' '. Html::encode($this->title) ?></h4>
            <?php 
            $gridColumnPresensiPegawaiJadwal = [
                    'jenispegawai_id',
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
            'attributes' => $gridColumnPresensiPegawaiJadwal            ]);
            ?>
                                <br>
            <h4>PresensiPegawaiLog<?= ' '. Html::encode($this->title) ?></h4>
            <?php 
            $gridColumnPresensiPegawaiLog = [
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
            'model' => $model->logmasuk,
            'attributes' => $gridColumnPresensiPegawaiLog            ]);
            ?>
                                <br>
            <h4>PresensiPegawaiLog<?= ' '. Html::encode($this->title) ?></h4>
            <?php 
            $gridColumnPresensiPegawaiLog = [
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
            'model' => $model->logpulang,
            'attributes' => $gridColumnPresensiPegawaiLog            ]);
            ?>
                                <br>
            <h4>CutiPegawaiData<?= ' '. Html::encode($this->title) ?></h4>
            <?php 
            $gridColumnCutiPegawaiData = [
                    'jeniscuti_id',
        [
            'attribute' => 'pegawai.pegawai_id',
            'label' => 'Pegawai',
        ],
        'keterangan_cuti',
        'domisili_cuti',
        'nohp',
        'tgl_pengajuancuti',
        'tgl_awal',
        'tgl_tidak_cuti',
        'tgl_akhir',
        'tgl_setujuicuti',
        'jml_hari',
        'statuspengajuan_id',
        'pegawai_acc',
        'file_datadukung',
        'created_at',
        'updated_at',
            ];
            echo DetailView::widget([
            'model' => $model->cuti,
            'attributes' => $gridColumnCutiPegawaiData            ]);
            ?>
                                <br>
            <h4>IzinPegawaiData<?= ' '. Html::encode($this->title) ?></h4>
            <?php 
            $gridColumnIzinPegawaiData = [
                    'jenisizin_id',
        [
            'attribute' => 'pegawai.pegawai_id',
            'label' => 'Pegawai',
        ],
        'keterangan_izin',
        'tgl_pengajuanizin',
        'tgl_awal',
        'tgl_izin',
        'tgl_akhir',
        'tgl_setujuiizin',
        'jml_hari',
        'pegawai_acc',
        'bukti',
        'statuspengajuan_id',
        'created_at',
        'updated_at',
            ];
            echo DetailView::widget([
            'model' => $model->izin,
            'attributes' => $gridColumnIzinPegawaiData            ]);
            ?>
            </div>