<?php

namespace app\models;

use Yii;
use \app\models\base\PresensiPegawaiJadwal as BasePresensiPegawaiJadwal;

/**
 * This is the model class for table "presensi_pegawai_jadwal".
 */
class PresensiPegawaiJadwal extends BasePresensiPegawaiJadwal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['jadwalpresensi_id', 'kode_hari', 'jadwal_masuk', 'jadwal_pulang', 'batas_awal_masuk', 'batas_akhir_masuk', 'batas_awal_pulang', 'batas_akhir_pulang'], 'required'],
            [['jadwal_masuk', 'jadwal_pulang', 'batas_awal_masuk', 'batas_akhir_masuk', 'batas_awal_pulang', 'batas_akhir_pulang', 'created_at', 'updated_at'], 'safe'],
            [['isaktif'], 'string'],
            [['jadwalpresensi_id'], 'string', 'max' => 20],
            [['jenispegawai_id', 'jenispresensi'], 'string', 'max' => 10],
            [['kode_hari'], 'string', 'max' => 5]
        ]);
    }
	
}
