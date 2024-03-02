<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\Statuspegawai */

$this->title = 'Create Statuspegawai';
$this->params['breadcrumbs'][] = ['label' => 'Statuspegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statuspegawai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
