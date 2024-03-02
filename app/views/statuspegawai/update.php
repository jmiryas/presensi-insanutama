<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\Statuspegawai */

$this->title = 'Update Statuspegawai: ' . ' ' . $model->statuspegawai;
$this->params['breadcrumbs'][] = ['label' => 'Statuspegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->statuspegawai, 'url' => ['view', 'id' => $model->statuspegawai_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="statuspegawai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
