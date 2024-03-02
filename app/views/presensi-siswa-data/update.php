<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiSiswaData */

$this->title = 'Update Presensi Siswa Data: ' . ' ' . $model->presensi_id;
$this->params['breadcrumbs'][] = ['label' => 'Presensi Siswa Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->presensi_id, 'url' => ['view', 'id' => $model->presensi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="presensi-siswa-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
