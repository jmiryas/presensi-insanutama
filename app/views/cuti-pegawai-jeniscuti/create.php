<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\CutiPegawaiJeniscuti */

$this->title = 'Create Cuti Pegawai Jeniscuti';
$this->params['breadcrumbs'][] = ['label' => 'Cuti Pegawai Jeniscuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuti-pegawai-jeniscuti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
