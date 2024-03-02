<?php

namespace app\models;

use Yii;
use \app\models\base\CutiPegawaiData as BaseCutiPegawaiData;

/**
 * This is the model class for table "cuti_pegawai_data".
 */
class CutiPegawaiData extends BaseCutiPegawaiData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['jeniscuti_id', 'keterangan_cuti', 'nohp', 'tgl_pengajuancuti', 'tgl_awal', 'tgl_akhir', 'jml_hari'], 'required'],
            [['jeniscuti_id', 'jml_hari'], 'integer'],
            [['tgl_pengajuancuti', 'tgl_awal', 'tgl_akhir', 'tgl_setujuicuti', 'created_at', 'updated_at'], 'safe'],
            [['pegawai_id', 'statuspengajuan_id', 'pegawai_acc', 'file_datadukung'], 'string', 'max' => 20],
            [['keterangan_cuti'], 'string', 'max' => 255],
            [['domisili_cuti'], 'string', 'max' => 50],
            [['nohp'], 'string', 'max' => 15],
            [['tgl_tidak_cuti'], 'string', 'max' => 400]
        ]);
    }
	
}
