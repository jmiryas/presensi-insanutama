<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\Pendidikanpegawai */

$this->title = 'Create Pendidikanpegawai';
$this->params['breadcrumbs'][] = ['label' => 'Pendidikanpegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendidikanpegawai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
