<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\IzinPegawaiData */

$this->title = $model->izin_id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Pegawai Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-pegawai-data-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Izin Pegawai Data'  . Html::encode($this->title) ?></h2>

        <div>

            <?= GhostHtml::a('Baru', ['/izin-pegawai-data/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/izin-pegawai-data/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/izin-pegawai-data/update', 'id' => $model->izin_id], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/izin-pegawai-data/delete', 'id' => $model->izin_id], [
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
        'izin_id',
        [
            'attribute' => 'jenisizin.jenisizin_id',
            'label' => 'Jenisizin',
        ],
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
        [
            'attribute' => 'pegawaiAcc.pegawai_id',
            'label' => 'Pegawai Acc',
        ],
        'bukti',
        [
            'attribute' => 'statuspengajuan.statuspengajuan_id',
            'label' => 'Statuspengajuan',
        ],
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
    <h4>IzinPegawaiJenisizin<?= ' ' . Html::encode($this->title) ?></h4>
    <?php
    $gridColumnIzinPegawaiJenisizin = [
        'nama_jenisizin',
    ];
    echo DetailView::widget([
        'model' => $model->jenisizin,
        'attributes' => $gridColumnIzinPegawaiJenisizin
    ]);
    ?>
    <br>
    <h4>Statuspengajuan<?= ' ' . Html::encode($this->title) ?></h4>
    <?php
    $gridColumnStatuspengajuan = [
        'ket_statuspengajuan',
    ];
    echo DetailView::widget([
        'model' => $model->statuspengajuan,
        'attributes' => $gridColumnStatuspengajuan
    ]);
    ?>
    <br>
    <h4>Pegawai<?= ' ' . Html::encode($this->title) ?></h4>
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
        'attributes' => $gridColumnPegawai
    ]);
    ?>
    <br>
    <h4>Pegawai<?= ' ' . Html::encode($this->title) ?></h4>
    <?php
    $gridColumnPegawai = [
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
        // 'model' => $model->pegawaiAcc,
        'model' => $model,
        'attributes' => $gridColumnPegawai
    ]);
    ?>
    <?php
    if ($providerPresensiPegawaiData->totalCount) {
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
            'status_kehadiran',
            [
                'attribute' => 'cuti.cuti_id',
                'label' => 'Cuti'
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
</div>