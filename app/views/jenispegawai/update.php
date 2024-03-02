<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\Jenispegawai */

$this->title = 'Update Jenispegawai: ' . ' ' . $model->jenispegawai_id;
$this->params['breadcrumbs'][] = ['label' => 'Jenispegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenispegawai_id, 'url' => ['view', 'id' => $model->jenispegawai_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenispegawai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
