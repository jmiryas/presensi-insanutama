<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\Statuspegawai */

$this->title = $model->statuspegawai;
$this->params['breadcrumbs'][] = ['label' => 'Statuspegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statuspegawai-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Statuspegawai'  . Html::encode($this->title) ?></h2>

        <div>
                                    
            <?= GhostHtml::a('Baru', ['/statuspegawai/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/statuspegawai/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/statuspegawai/update', 'id' => $model->statuspegawai_id], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/statuspegawai/delete', 'id' => $model->statuspegawai_id], [
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
            'statuspegawai_id',
        'statuspegawai',
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
            [
                'attribute' => 'jenispegawai.jenispegawai_id',
                'label' => 'Jenispegawai'
            ],
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
            </div>