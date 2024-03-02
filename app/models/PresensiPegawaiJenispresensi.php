<?php

namespace app\models;

use Yii;
use \app\models\base\PresensiPegawaiJenispresensi as BasePresensiPegawaiJenispresensi;

/**
 * This is the model class for table "presensi_pegawai_jenispresensi".
 */
class PresensiPegawaiJenispresensi extends BasePresensiPegawaiJenispresensi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['jenispresensi'], 'required'],
            [['jenispresensi'], 'string', 'max' => 10]
        ]);
    }
	
}
