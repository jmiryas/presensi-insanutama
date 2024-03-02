<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\Jenispegawai */

$this->title = 'Create Jenispegawai';
$this->params['breadcrumbs'][] = ['label' => 'Jenispegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenispegawai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
