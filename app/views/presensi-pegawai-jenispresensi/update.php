<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiPegawaiJenispresensi */

$this->title = 'Update Presensi Pegawai Jenispresensi: ' . ' ' . $model->jenispresensi;
$this->params['breadcrumbs'][] = ['label' => 'Presensi Pegawai Jenispresensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenispresensi, 'url' => ['view', 'id' => $model->jenispresensi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="presensi-pegawai-jenispresensi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
