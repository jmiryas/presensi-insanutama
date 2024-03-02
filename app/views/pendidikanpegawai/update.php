<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\Pendidikanpegawai */

$this->title = 'Update Pendidikanpegawai: ' . ' ' . $model->pendidikanpegawai_id;
$this->params['breadcrumbs'][] = ['label' => 'Pendidikanpegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pendidikanpegawai_id, 'url' => ['view', 'id' => $model->pendidikanpegawai_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pendidikanpegawai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
