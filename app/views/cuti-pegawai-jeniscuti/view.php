<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\CutiPegawaiJeniscuti */

$this->title = $model->jeniscuti_id;
$this->params['breadcrumbs'][] = ['label' => 'Cuti Pegawai Jeniscuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuti-pegawai-jeniscuti-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Cuti Pegawai Jeniscuti'  . Html::encode($this->title) ?></h2>

        <div>
                                    
            <?= GhostHtml::a('Baru', ['/cuti-pegawai-jeniscuti/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/cuti-pegawai-jeniscuti/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/cuti-pegawai-jeniscuti/update', 'id' => $model->jeniscuti_id], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/cuti-pegawai-jeniscuti/delete', 'id' => $model->jeniscuti_id], [
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
            'jeniscuti_id',
        'nama_jeniscuti',
    ];
    echo DetailView::widget([
    'model' => $model,
    'attributes' => $gridColumn
    ]);
    ?>
    <br>
                            <?php
                if($providerCutiPegawaiData->totalCount){
                $gridColumnCutiPegawaiData = [
                ['class' => 'yii\grid\SerialColumn'],
                            'cuti_id',
                        [
                'attribute' => 'pegawai.pegawai_id',
                'label' => 'Pegawai'
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
            </div>