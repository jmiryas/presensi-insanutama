<?php

namespace app\models;

use Yii;
use \app\models\base\CutiPegawaiJeniscuti as BaseCutiPegawaiJeniscuti;

/**
 * This is the model class for table "cuti_pegawai_jeniscuti".
 */
class CutiPegawaiJeniscuti extends BaseCutiPegawaiJeniscuti
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nama_jeniscuti'], 'required'],
            [['nama_jeniscuti'], 'string', 'max' => 20]
        ]);
    }
	
}
