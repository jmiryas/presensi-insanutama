<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\IzinPegawaiJenisizin */

$this->title = 'Create Izin Pegawai Jenisizin';
$this->params['breadcrumbs'][] = ['label' => 'Izin Pegawai Jenisizin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-pegawai-jenisizin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
