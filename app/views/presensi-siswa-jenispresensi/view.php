<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiSiswaJenispresensi */

$this->title = $model->jenispresensi;
$this->params['breadcrumbs'][] = ['label' => 'Presensi Siswa Jenispresensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-siswa-jenispresensi-view">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h2><?= 'Presensi Siswa Jenispresensi' ?></h2>

        <div>

            <?= GhostHtml::a('Baru', ['/presensi-siswa-jenispresensi/create'], ['class' => 'btn btn-success']) ?>
            <?= GhostHtml::a('List', ['/presensi-siswa-jenispresensi/index'], ['class' => 'btn btn-info']) ?>
            <?= GhostHtml::a('Update', ['/presensi-siswa-jenispresensi/update', 'id' => $model->jenispresensi], ['class' => 'btn btn-primary']) ?>
            <?= GhostHtml::a('Delete', ['/presensi-siswa-jenispresensi/delete', 'id' => $model->jenispresensi], [
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
        'jenispresensi',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
    ?>
    <br>
    <?php
    if ($providerPresensiSiswaJadwal->totalCount) {
        $gridColumnPresensiSiswaJadwal = [
            ['class' => 'yii\grid\SerialColumn'],
            'jadwalpresensi_id',
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