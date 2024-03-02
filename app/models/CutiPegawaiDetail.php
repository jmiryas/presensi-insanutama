<?php

namespace app\models;

use Yii;
use \app\models\base\CutiPegawaiDetail as BaseCutiPegawaiDetail;

/**
 * This is the model class for table "cuti_pegawai_detail".
 */
class CutiPegawaiDetail extends BaseCutiPegawaiDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['cuti_id', 'tgl_cuti'], 'required'],
            [['cuti_id'], 'integer'],
            [['tgl_cuti'], 'safe']
        ]);
    }
	
}
