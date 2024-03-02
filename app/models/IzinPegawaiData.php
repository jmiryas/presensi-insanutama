<?php

namespace app\models;

use Yii;
use \app\models\base\IzinPegawaiData as BaseIzinPegawaiData;

/**
 * This is the model class for table "izin_pegawai_data".
 */
class IzinPegawaiData extends BaseIzinPegawaiData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['jenisizin_id', 'keterangan_izin', 'tgl_pengajuanizin', 'tgl_awal', 'tgl_akhir', 'jml_hari', 'bukti'], 'required'],
            [['jenisizin_id', 'jml_hari'], 'integer'],
            [['tgl_pengajuanizin', 'tgl_awal', 'tgl_akhir', 'tgl_setujuiizin', 'created_at', 'updated_at'], 'safe'],
            [['pegawai_id', 'pegawai_acc', 'statuspengajuan_id'], 'string', 'max' => 20],
            [['keterangan_izin', 'bukti'], 'string', 'max' => 255],
            [['tgl_izin'], 'string', 'max' => 400]
        ]);
    }
	
}
