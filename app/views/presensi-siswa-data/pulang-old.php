<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiData */

$this->title = 'Presensi Pulang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-data-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <?php $form = ActiveForm::begin(); ?>
                <!-- <img class="card-img-top" src="holder.js/100px180/" alt="Title" /> -->
                <div class="card-body">
                    <h4 class="card-title">No Kartu</h4>
                    <div class="mb-3">
                        <input type="text" class="form-control" autofocus name="nokartu" id="" aria-describedby="helpId" placeholder="" />
                        <small id="helpId" class="form-text text-muted">Tap kartu pada RFID reader</small>
                    </div>
                </div>
                <!-- <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?> -->
                <?php ActiveForm::end(); ?>
            </div>

            <?= Html::a('<span style="margin-right: 10px;" class="glyphicon glyphicon-chevron-left"></span>Home', ['/'], ['class' => 'btn btn-info mt-2']) ?>
        </div>
    </div>
</div>