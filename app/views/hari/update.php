<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\base\Hari */

$this->title = 'Update Hari: ' . ' ' . $model->kodehari;
$this->params['breadcrumbs'][] = ['label' => 'Hari', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kodehari, 'url' => ['view', 'id' => $model->kodehari]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hari-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
