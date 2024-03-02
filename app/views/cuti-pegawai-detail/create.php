<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\CutiPegawaiDetail */

$this->title = 'Create Cuti Pegawai Detail';
$this->params['breadcrumbs'][] = ['label' => 'Cuti Pegawai Detail', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuti-pegawai-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
