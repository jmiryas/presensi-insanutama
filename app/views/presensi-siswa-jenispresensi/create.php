<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiSiswaJenispresensi */

$this->title = 'Create Presensi Siswa Jenispresensi';
$this->params['breadcrumbs'][] = ['label' => 'Presensi Siswa Jenispresensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-siswa-jenispresensi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
