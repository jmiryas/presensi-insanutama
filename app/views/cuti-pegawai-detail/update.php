<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\CutiPegawaiDetail */

$this->title = 'Update Cuti Pegawai Detail: ' . ' ' . $model->cutidetail_id;
$this->params['breadcrumbs'][] = ['label' => 'Cuti Pegawai Detail', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cutidetail_id, 'url' => ['view', 'id' => $model->cutidetail_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cuti-pegawai-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
