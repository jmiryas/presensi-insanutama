<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\CutiPegawaiData */

$this->title = 'Update Cuti Pegawai Data: ' . ' ' . $model->cuti_id;
$this->params['breadcrumbs'][] = ['label' => 'Cuti Pegawai Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cuti_id, 'url' => ['view', 'id' => $model->cuti_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cuti-pegawai-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
