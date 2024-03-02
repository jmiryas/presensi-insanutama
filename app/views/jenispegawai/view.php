<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\Jenispegawai */

$this->title = $model->jenispegawai_id;
$this->params['breadcrumbs'][] = ['label' => 'Jenispegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenispegawai-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Jenispegawai'  . Html::encode($this->title) ?></h2>

        <div>
                                    
            <?= GhostHtml::a('Baru', ['/jenispegawai/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/jenispegawai/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/jenispegawai/update', 'id' => $model->jenispegawai_id], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/jenispegawai/delete', 'id' => $model->jenispegawai_id], [
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
            'jenispegawai_id',
        'nama_jenispegawai',
    ];
    echo DetailView::widget([
    'model' => $model,
    'attributes' => $gridColumn
    ]);
    ?>
    <br>
                            <?php
                if($providerPegawai->totalCount){
                $gridColumnPegawai = [
                ['class' => 'yii\grid\SerialColumn'],
                            'pegawai_id',
            'nik',
            'nip',
            'nama_pegawai',
            [
                'attribute' => 'jeniskelamin.jeniskelamin_id',
                'label' => 'Jeniskelamin'
            ],
            'tempat_lahir',
            'tgl_lahir',
            'alamat',
            'status_kawin',
            'nama_pasangan',
            'sekolah_id',
            'tmt',
            [
                'attribute' => 'statuspegawai.statuspegawai',
                'label' => 'Statuspegawai'
            ],
            [
                'attribute' => 'pangkatgolongan.pangkatgolongan_id',
                'label' => 'Pangkatgolongan'
            ],
            [
                'attribute' => 'pendidikanpegawai.pendidikanpegawai_id',
                'label' => 'Pendidikanpegawai'
            ],
            'jurusan',
            'nama_sekolah',
            'sertifikasi',
            'status_inpasing',
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
                echo Gridview::widget([
                'dataProvider' => $providerPegawai,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pegawai']],
                'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Pegawai'),
                ],
                                    'export' => false,
                                'columns' => $gridColumnPegawai
                ]);
                }
                ?>
                                    <?php
                if($providerPresensiPegawaiJadwal->totalCount){
                $gridColumnPresensiPegawaiJadwal = [
                ['class' => 'yii\grid\SerialColumn'],
                            'jadwalpresensi_id',
                        [
                'attribute' => 'jenispresensi0.jenispresensi',
                'label' => 'Jenispresensi'
            ],
            [
                'attribute' => 'kodeHari.kodehari',
                'label' => 'Kode Hari'
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
                echo Gridview::widget([
                'dataProvider' => $providerPresensiPegawaiJadwal,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presensi-pegawai-jadwal']],
                'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Presensi Pegawai Jadwal'),
                ],
                                    'export' => false,
                                'columns' => $gridColumnPresensiPegawaiJadwal
                ]);
                }
                ?>
            </div>