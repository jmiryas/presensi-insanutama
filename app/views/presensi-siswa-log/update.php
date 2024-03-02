<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiSiswaLog */

$this->title = 'Update Presensi Siswa Log: ' . ' ' . $model->logpresensi_id;
$this->params['breadcrumbs'][] = ['label' => 'Presensi Siswa Log', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->logpresensi_id, 'url' => ['view', 'id' => $model->logpresensi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="presensi-siswa-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
