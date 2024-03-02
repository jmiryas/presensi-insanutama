<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\CutiPegawaiDetail */

$this->title = $model->cutidetail_id;
$this->params['breadcrumbs'][] = ['label' => 'Cuti Pegawai Detail', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuti-pegawai-detail-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Cuti Pegawai Detail'  . Html::encode($this->title) ?></h2>

        <div>
                                    
            <?= GhostHtml::a('Baru', ['/cuti-pegawai-detail/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/cuti-pegawai-detail/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/cuti-pegawai-detail/update', 'id' => $model->cutidetail_id], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/cuti-pegawai-detail/delete', 'id' => $model->cutidetail_id], [
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
            'cutidetail_id',
        [
            'attribute' => 'cuti.cuti_id',
            'label' => 'Cuti',
        ],
        'tgl_cuti',
    ];
    echo DetailView::widget([
    'model' => $model,
    'attributes' => $gridColumn
    ]);
    ?>
    <br>
                        <br>
            <h4>CutiPegawaiData<?= ' '. Html::encode($this->title) ?></h4>
            <?php 
            $gridColumnCutiPegawaiData = [
                    'jeniscuti_id',
        'pegawai_id',
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
            echo DetailView::widget([
            'model' => $model->cuti,
            'attributes' => $gridColumnCutiPegawaiData            ]);
            ?>
            </div>