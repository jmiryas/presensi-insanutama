<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

$this->title = 'Laporan Bulanan';
$this->params['breadcrumbs'][] = $this->title;
$this->params['useContainer'] = false;

$this->registerJsFile("https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js");

$bulan = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember',
];
?>
<div class="index panel panel-default">
    <div class="panel-body">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin([
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'method' => 'GET'
        ]) ?>

        <div class="row mb-2">
            <div class="col-md-6">
                <?= $form->field($model, 'tahun')->dropDownList([
                    '2022' => '2022',
                    '2023' => '2023',
                    '2024' => '2024',
                    '2025' => '2025',
                    '2026' => '2026',
                ]) ?>
                <?= $form->field($model, 'bulan')->dropDownList($bulan)  ?>
                <?= $form->field($model, 'jenispresensi')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(Yii::$app->db->createCommand("SELECT DISTINCT jenispresensi FROM presensi_pegawai_jadwal")->queryAll(), 'jenispresensi', 'jenispresensi'),
                    'options' => ['placeholder' => 'Choose Jenis Presensi'],
                    'pluginOptions' => [
                        // 'width' => '200px'
                    ],
                ]); ?>

                <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']); ?>
                <?= Html::a('Reset', ['laporan/laporan-bulanan'], ['class' => 'btn btn-danger']); ?>
                <?= empty($datasiswa) ? '' : Html::button('Excel', ['class' => 'btn btn-success-old', 'onclick' => 'ExportToExcel("xlsx")']) ?>
            </div>
        </div>

        <?php ActiveForm::end() ?>

        <div class="table-responsive" id="excel-this">
            <table class="table table-striped table-hover table-borderless table-primary align-middle table-sm">
                <thead class="table-light">
                    <tr>
                        <th class="bg-dangerx atext-light">No</th>
                        <th class="bg-dangerx atext-light">NIK</th>
                        <th class="bg-dangerx atext-light">Nama</th>
                        <th class="bg-dangerx atext-light">Jenis Kelamin</th>
                        <!-- <th class="bg-dangerx atext-light">Jenis Presensi</th> -->
                        <th class="bg-dangerx atext-light">Bulan / Tahun</th>

                        <?php foreach ($label_tanggalan as $tanggal) : ?>
                            <th class="bg-light"><?= $tanggal ?></th>
                        <?php endforeach; ?>

                        <?php foreach ($label_jenispresensi as $presensi) : ?>
                            <th class="bg-warning"><?= $presensi ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php if (empty($datasiswa)) : ?>
                        <tr>
                            <td colspan="5" class="text-center"><i>Tidak ada data.</i></td>
                        </tr>
                    <?php else : ?>
                        <?php
                        $i = 1;
                        foreach ($datasiswa as $row) : ?>
                            <tr class="table-primary">
                                <td><?= $i++ ?>.</td>
                                <td><?= $row['nik'] ?></td>
                                <td><?= $row['nama_pegawai'] ?></td>
                                <td><?= $row['jeniskelamin_id'] ?></td>
                                <!-- <td><? // $row['jenispresensi'] 
                                            ?></td> -->
                                <td><?= $bulan[$model->bulan] . ' / ' . $model->tahun ?></td>

                                <?php foreach ($label_tanggalan as $tanggal) : ?>
                                    <td><?= $datasebulan[$row['nik']][$tanggal] ?? "";
                                        ?></td>
                                <?php endforeach; ?>

                                <?php foreach ($label_jenispresensi as $presensi) : ?>
                                    <th><?= $datasumpresensi[$row['nik']][$presensi] ?? 0
                                        ?></th>
                                <?php endforeach; ?>
                            </tr>
                    <?php endforeach;
                    endif ?>
                </tbody>
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
            XLSX.writeFile(wb, fn || ("Laporan Presensi Bulanan." + (type || "xlsx")));
    }
</script>