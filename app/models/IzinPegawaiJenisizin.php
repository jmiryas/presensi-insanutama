<?php

namespace app\models;

use Yii;
use \app\models\base\IzinPegawaiJenisizin as BaseIzinPegawaiJenisizin;

/**
 * This is the model class for table "izin_pegawai_jenisizin".
 */
class IzinPegawaiJenisizin extends BaseIzinPegawaiJenisizin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nama_jenisizin'], 'required'],
            [['nama_jenisizin'], 'string', 'max' => 20]
        ]);
    }
	
}
