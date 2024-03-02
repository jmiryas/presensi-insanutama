<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\IzinPegawaiJenisizin */

$this->title = $model->jenisizin_id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Pegawai Jenisizin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-pegawai-jenisizin-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Izin Pegawai Jenisizin'  . Html::encode($this->title) ?></h2>

        <div>
                                    
            <?= GhostHtml::a('Baru', ['/izin-pegawai-jenisizin/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/izin-pegawai-jenisizin/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/izin-pegawai-jenisizin/update', 'id' => $model->jenisizin_id], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/izin-pegawai-jenisizin/delete', 'id' => $model->jenisizin_id], [
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
            'jenisizin_id',
        'nama_jenisizin',
    ];
    echo DetailView::widget([
    'model' => $model,
    'attributes' => $gridColumn
    ]);
    ?>
    <br>
                            <?php
                if($providerIzinPegawaiData->totalCount){
                $gridColumnIzinPegawaiData = [
                ['class' => 'yii\grid\SerialColumn'],
                            'izin_id',
                        [
                'attribute' => 'pegawai.pegawai_id',
                'label' => 'Pegawai'
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
                'label' => 'Pegawai Acc'
            ],
            'bukti',
            [
                'attribute' => 'statuspengajuan.statuspengajuan_id',
                'label' => 'Statuspengajuan'
            ],
            'created_at',
            'updated_at',
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
            </div>