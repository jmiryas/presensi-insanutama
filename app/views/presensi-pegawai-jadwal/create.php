<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiPegawaiJadwal */

$this->title = 'Create Presensi Pegawai Jadwal';
$this->params['breadcrumbs'][] = ['label' => 'Presensi Pegawai Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-pegawai-jadwal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
