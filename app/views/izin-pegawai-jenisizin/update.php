<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\IzinPegawaiJenisizin */

$this->title = 'Update Izin Pegawai Jenisizin: ' . ' ' . $model->jenisizin_id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Pegawai Jenisizin', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenisizin_id, 'url' => ['view', 'id' => $model->jenisizin_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="izin-pegawai-jenisizin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
