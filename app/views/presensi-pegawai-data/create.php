<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiPegawaiData */

$this->title = 'Create Presensi Pegawai Data';
$this->params['breadcrumbs'][] = ['label' => 'Presensi Pegawai Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-pegawai-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
