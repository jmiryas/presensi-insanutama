<?php

use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use yii\helpers\Html;

$this->title = 'Laporan Harian';
$this->params['breadcrumbs'][] = $this->title;
$this->params['useContainer'] = false;

$this->registerJsFile("https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js");
?>
<div class="index panel panel-default">
    <div class="panel-body">

        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin([
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'method' => 'GET'
        ]) ?>

        <div class="row mb-2">
            <div class="col-md-8">
                <?= $form->field($model, 'tgl')->widget(DatePicker::classname(), [
                    // 'type' => DatePicker::TYPE_RANGE,
                    // 'attribute2' => 'tglakhir',
                    'pluginOptions' => [
                        'todayHighlight' => true,
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy'
                    ],
                ])->label('Tanggal') ?>
                <?= $form->field($model, 'jenispresensi')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(Yii::$app->db->createCommand("SELECT DISTINCT jenispresensi FROM presensi_pegawai_jadwal")->queryAll(), 'jenispresensi', 'jenispresensi'),
                    'options' => ['placeholder' => 'Choose Jenis Presensi'],
                    'pluginOptions' => [
                        // 'width' => '200px'
                    ],
                ]); ?>

                <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']); ?>
                <?= Html::a('Reset', ['laporan/laporan-harian'], ['class' => 'btn btn-danger']); ?>
                <?= empty($data) ? '' : Html::button('Excel', ['class' => 'btn btn-success-old', 'onclick' => 'ExportToExcel("xlsx")']) ?>
            </div>
        </div>

        <?php ActiveForm::end() ?>

        <div class="table-responsive" id="excel-this">
            <table class="table table-striped table-hover table-borderless table-primary align-middle">
                <thead class="table-light">
                    <th class="bg-dangerx atext-light">No</th>
                    <th class="bg-dangerx atext-light">NIK</th>
                    <th class="bg-dangerx atext-light">Nama</th>
                    <th class="bg-dangerx atext-light">Jenis Presensi</th>
                    <th class="bg-dangerx atext-light">Tanggal</th>
                    <th class="bg-dangerx atext-light">Masuk</th>
                    <th class="bg-dangerx atext-light">Pulang</th>
                    <th class="bg-dangerx atext-light">Status Presensi</th>
                    <th class="bg-dangerx atext-light">Keterangan</th>
                    <th class="bg-dangerx atext-light">Aksi</th>
                </thead>
                <tbody class="table-group-divider">
                    <?php if (empty($data)) : ?>
                        <tr>
                            <td colspan="10" class="text-center"><i>Tidak ada data.</i></td>
                        </tr>
                    <?php else : ?>
                        <?php
                        $i = 1;
                        foreach ($data as $row) : ?>
                            <tr class="table-primary">
                                <td><?= $i++ ?>.</td>
                                <td><?= $row['nik'] ?></td>
                                <td><?= $row['nama_pegawai'] ?></td>
                                <td><?= $row['jenispresensi'] ?></td>
                                <td><?= $row['hari'] . ', ' . date('d-m-Y', strtotime($row['tgl'])) ?></td>
                                <td><?= $row['jam_masuk'] ?? '-' ?></td>
                                <td><?= $row['jam_pulang'] ?? '-' ?></td>
                                <td><?= $row['status_kehadiran'] ?? '-' ?></td>
                                <td><?= $row['keterangan'] ?? '-' ?></td>
                                <th><?= Html::a('Manual', ['presensi-pegawai-data/manual', 'id' => $row['presensi_id'], 'nama' => $row['nama_pegawai']]) ?></th>
                            </tr>
                    <?php endforeach;
                    endif ?>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>
</div>
<script>
    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById("excel-this");
        var wb = XLSX.utils.table_to_book(elt, {
            sheet: "sheet1"
        });
        return dl ?
            XLSX.write(wb, {
                bookType: type,
                bookSST: true,
                type: "base64"
            }) :
            XLSX.writeFile(wb, fn || ("Laporan Presensi Harian." + (type || "xlsx")));
    }
</script>