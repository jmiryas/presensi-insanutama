<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\CutiPegawaiData */

$this->title = 'Create Cuti Pegawai Data';
$this->params['breadcrumbs'][] = ['label' => 'Cuti Pegawai Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuti-pegawai-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
