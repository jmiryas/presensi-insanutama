<?php

/** @var yii\web\View $this */

use kartik\form\ActiveForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = Yii::$app->name;

// $js = <<< JS
//     // Mengirim teks ke modal saat tombol ditekan
//     $('#myModal').on('show.bs.modal', function (event) {
//         var button = $(event.relatedTarget); // Tombol yang memicu modal
//         var title = button.find('span').text(); // Mengambil teks dari tombol
//         var modal = $(this);
//         modal.find('.modal-header #myModal-label').text(title); // Memasukkan teks ke dalam modal
//     })
// JS;
// $this->registerJs($js);
?>

<?php
/* MODAL MASUK */
Modal::begin(['id' => 'modalMasuk', 'title' => 'Presensi Masuk']);
ActiveForm::begin(['action' => ['presensi-siswa-data/masuk'], 'method' => 'get']);
echo Html::tag('label', 'Pilih jenis presensi masuk');
echo Html::dropDownList('jenis', null, ArrayHelper::map(Yii::$app->db->createCommand("SELECT * FROM presensi_pegawai_jenispresensi")->queryAll(), 'jenispresensi', 'jenispresensi'), ['class' => 'form-control']);
echo Html::submitButton('Lanjut', ['class' => 'btn btn-primary mt-1']);
ActiveForm::end();
Modal::end();
?>

<?php
/* MODAL PULANG */
Modal::begin(['id' => 'modalPulang', 'title' => 'Presensi Pulang']);
ActiveForm::begin(['action' => ['presensi-siswa-data/pulang'], 'method' => 'get']);
echo Html::tag('label', 'Pilih jenis presensi pulang');
echo Html::dropDownList('jenis', null, ArrayHelper::map(Yii::$app->db->createCommand("SELECT * FROM presensi_pegawai_jenispresensi")->queryAll(), 'jenispresensi', 'jenispresensi'), ['class' => 'form-control']);
echo Html::submitButton('Lanjut', ['class' => 'btn btn-primary mt-1']);
ActiveForm::end();
Modal::end();
?>


<div class="site-index">

    <div class="jumbotron text-center bg-transparent mb-5">
        <h1 class="display-4">Presensi!</h1>

        <?php if (!Yii::$app->user->isGuest) : ?>
            <a href="#" class="btn btn-success-old" style="width: calc(130px);" data-toggle="modal" data-target="#modalMasuk">
                <div class="d-flex flex-column justify-content-center">
                    <img src="<?= Url::to('@web/img/card-tap-in.png') ?>" style="width: calc(130px - (1.75rem));">
                    <i class="dropdown-divider"></i>
                    <span>Presensi Masuk</span>
                </div>
            </a>

            <a href="#" class="btn btn-primary" style="width: calc(130px);" data-toggle="modal" data-target="#modalPulang">
                <div class="d-flex flex-column justify-content-center">
                    <img src="<?= Url::to('@web/img/card-tap-out.png') ?>" style="width: calc(130px - (1.75rem));">
                    <i class="dropdown-divider"></i>
                    <span>Presensi Pulang</span>
                </div>
            </a>
        <?php endif; ?>
    </div>

    <!-- <div class="card">
        <div class="card-body">
            <h4 class="card-title">Presensi Masuk</h4>
            <p class="card-text">Body</p>
        </div>
    </div> -->

</div>