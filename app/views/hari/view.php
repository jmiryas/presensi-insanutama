<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\Hari */

$this->title = $model->kodehari;
$this->params['breadcrumbs'][] = ['label' => 'Hari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hari-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Hari'  . Html::encode($this->title) ?></h2>

        <div>
                                    
            <?= GhostHtml::a('Baru', ['/hari/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/hari/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/hari/update', 'id' => $model->kodehari], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/hari/delete', 'id' => $model->kodehari], [
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
            'kodehari',
        'namahari',
        'nourut',
        'hari_id',
    ];
    echo DetailView::widget([
    'model' => $model,
    'attributes' => $gridColumn
    ]);
    ?>
    <br>
                            <?php
                if($providerPresensiSiswaJadwal->totalCount){
                $gridColumnPresensiSiswaJadwal = [
                ['class' => 'yii\grid\SerialColumn'],
                            'jadwalpresensi_id',
            'jenispresensi',
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
                'dataProvider' => $providerPresensiSiswaJadwal,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presensi-siswa-jadwal']],
                'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Presensi Siswa Jadwal'),
                ],
                                    'export' => false,
                                'columns' => $gridColumnPresensiSiswaJadwal
                ]);
                }
                ?>
            </div>