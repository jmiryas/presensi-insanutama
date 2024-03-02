<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\CutiPegawaiJeniscuti */

$this->title = 'Update Cuti Pegawai Jeniscuti: ' . ' ' . $model->jeniscuti_id;
$this->params['breadcrumbs'][] = ['label' => 'Cuti Pegawai Jeniscuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jeniscuti_id, 'url' => ['view', 'id' => $model->jeniscuti_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cuti-pegawai-jeniscuti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
