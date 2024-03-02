<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\IzinPegawaiData */

$this->title = 'Update Izin Pegawai Data: ' . ' ' . $model->izin_id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Pegawai Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->izin_id, 'url' => ['view', 'id' => $model->izin_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="izin-pegawai-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
