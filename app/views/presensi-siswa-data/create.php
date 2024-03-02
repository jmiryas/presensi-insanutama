<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiSiswaData */

$this->title = 'Create Presensi Siswa Data';
$this->params['breadcrumbs'][] = ['label' => 'Presensi Siswa Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-siswa-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
