<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiSiswaJadwal */

$this->title = 'Update Presensi Siswa Jadwal: ' . ' ' . $model->jadwalpresensi_id;
$this->params['breadcrumbs'][] = ['label' => 'Presensi Siswa Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jadwalpresensi_id, 'url' => ['view', 'id' => $model->jadwalpresensi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="presensi-siswa-jadwal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
