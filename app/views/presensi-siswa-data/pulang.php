<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\PresensiData */

$this->title = 'Presensi Pulang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presensi-data-create">
    <h1><?= Html::encode($this->title) ?> <span id="jam-cd"></span></h1>
    <p><?= Yii::$app->db->createCommand("SELECT * FROM hari WHERE hari_id = :hari_id", [':hari_id' => date('N')])->queryScalar() . ', ' .  date('d-m-Y', strtotime($tanggal)) ?></p>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <!-- <img class="card-img-top" src="holder.js/100px180/" alt="Title" /> -->
                    <h4 class="card-title mb-2">No Kartu</h4>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-9 mt-1">
                                <input type="text" class="form-control" autofocus name="nokartu" id="" aria-describedby="helpId" placeholder="" autocomplete="off" />
                            </div>
                            <div class="col-md-3 mt-1">
                                <?= Html::submitButton('Kirim', ['class' => 'btn btn-primary btn-block']) ?>
                            </div>
                        </div>
                        <small id="helpId" class="form-text text-muted">Tap kartu pada RFID reader</small>
                    </div>
                    <?php ActiveForm::end(); ?>


                    <table class="table table-striped table-hover table-borderless table-success align-middle table-sm">
                        <thead class="table-light">
                            <tr>
                                <th>Hari</th>
                                <th>Jenis Presensi</th>
                                <th>Awal Presensi</th>
                                <th>Akhir Presensi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($pulangjadwal)) : ?>
                                <tr class="table-light">
                                    <td colspan="5" class="text-center"><i>Tidak ada jadwal.</i></td>
                                </tr>
                            <?php endif; ?>
                            <?php foreach ($pulangjadwal as $key => $row) : ?>
                                <?php
                                if ($row['keterangan_pulang'] == 'Tepat') {
                                    $class = 'table-success';
                                } else if ($row['keterangan_pulang'] == 'Telat') {
                                    $class = 'table-danger';
                                } else if ($row['keterangan_pulang'] == 'Belum') {
                                    $class = 'table-warning';
                                }
                                ?>
                                <tr class="<?= $class ?>">
                                    <td><?= $row['kode_hari'] ?></td>
                                    <td><?= $row['jenispresensi'] ?></td>
                                    <td><?= $row['batas_awal_pulang'] ?></td>
                                    <td><?= $row['batas_akhir_pulang'] ?></td>
                                    <td><?= $row['keterangan_pulang'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?= Html::a('<span style="margin-right: 10px;" class="glyphicon glyphicon-chevron-left"></span>Home', ['/'], ['class' => 'btn btn-info mt-2']) ?>
        </div>
    </div>
</div>

<script>
    function updateClock() {
        var now = new Date();
        var jam = now.getHours();
        var menit = now.getMinutes();
        var detik = now.getSeconds();

        // Tambahkan nol di depan angka jika kurang dari 10
        jam = (jam < 10) ? "0" + jam : jam;
        menit = (menit < 10) ? "0" + menit : menit;
        detik = (detik < 10) ? "0" + detik : detik;

        var jamCd = document.getElementById("jam-cd");
        jamCd.innerText = jam + ":" + menit + ":" + detik;

        // Update setiap 1 detik
        setTimeout(updateClock, 1000);
    }

    updateClock();
</script>