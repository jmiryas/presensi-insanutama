<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiPegawaiJenispresensi */

$this->title = 'Create Presensi Pegawai Jenispresensi';
$this->params['breadcrumbs'][] = ['label' => 'Presensi Pegawai Jenispresensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-pegawai-jenispresensi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
