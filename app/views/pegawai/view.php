<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\Pegawai */

$this->title = $model->pegawai_id;
$this->params['breadcrumbs'][] = ['label' => 'Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Pegawai'  . Html::encode($this->title) ?></h2>

        <div>

            <?= GhostHtml::a('Baru', ['/pegawai/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/pegawai/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/pegawai/update', 'id' => $model->pegawai_id], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/pegawai/delete', 'id' => $model->pegawai_id], [
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
        'pegawai_id',
        'nik',
        'nip',
        'nama_pegawai',
        'jeniskelamin_id',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'status_kawin',
        'nama_pasangan',
        // 'sekolah_id',
        // 'tmt',
        'statuspegawai_id',
        'pangkatgolongan_id',
        'pendidikanpegawai_id',
        // 'jurusan',
        // 'nama_sekolah',
        // 'sertifikasi',
        // 'status_inpasing',
        [
            'attribute' => 'jenispegawai.jenispegawai_id',
            'label' => 'Jenispegawai',
        ],
        'tugas_tambahan',
        // 'kaderisasi_nu',
        'foto_pegawai',
        'nokartu_pegawai',
        'pin_pegawai',
        // 'is_user',
        // 'kodeguru',
        // 'gaji_pokok',
        // 'jabatanstruktural_id',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
    ?>
    <br>
    <?php
    if ($providerCutiPegawaiData->totalCount) {
        $gridColumnCutiPegawaiData = [
            ['class' => 'yii\grid\SerialColumn'],
            'cuti_id',
            [
                'attribute' => 'jeniscuti.jeniscuti_id',
                'label' => 'Jeniscuti'
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
        ];
        echo Gridview::widget([
            'dataProvider' => $providerCutiPegawaiData,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-cuti-pegawai-data']],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Cuti Pegawai Data'),
            ],
            'export' => false,
            'columns' => $gridColumnCutiPegawaiData
        ]);
    }
    ?>
    <?php
    if ($providerIzinPegawaiData->totalCount) {
        $gridColumnIzinPegawaiData = [
            ['class' => 'yii\grid\SerialColumn'],
            'izin_id',
            [
                'attribute' => 'jenisizin.jenisizin_id',
                'label' => 'Jenisizin'
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
            [
                'attribute' => 'statuspengajuan.statuspengajuan_id',
                'label' => 'Statuspengajuan'
            ],
        ];
        echo Gridview::widget([
            'dataProvider' => $providerIzinPegawaiData,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-izin-pegawai-data']],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Izin Pegawai Data'),
            ],
            'export' => false,
            'columns' => $gridColumnIzinPegawaiData
        ]);
    }
    ?>
    <br>
    <h4>Jenispegawai<?= ' ' . Html::encode($this->title) ?></h4>
    <?php
    $gridColumnJenispegawai = [
        'nama_jenispegawai',
    ];
    echo DetailView::widget([
        'model' => $model->jenispegawai,
        'attributes' => $gridColumnJenispegawai
    ]);
    ?>
    <?php
    if ($providerPresensiPegawaiLog->totalCount) {
        $gridColumnPresensiPegawaiLog = [
            ['class' => 'yii\grid\SerialColumn'],
            'logpresensi_id',
            'waktu',
            'nokartu',
            'latitude',
            'longitude',
            'jarakpresensi',
            'kodeta',
            'kodekelas',
            'jenispresensi',
        ];
        echo Gridview::widget([
            'dataProvider' => $providerPresensiPegawaiLog,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presensi-pegawai-log']],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Presensi Pegawai Log'),
            ],
            'export' => false,
            'columns' => $gridColumnPresensiPegawaiLog
        ]);
    }
    ?>
</div>