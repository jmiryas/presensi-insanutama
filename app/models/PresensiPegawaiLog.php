<?php

namespace app\models;

use Yii;
use \app\models\base\PresensiPegawaiLog as BasePresensiPegawaiLog;

/**
 * This is the model class for table "presensi_pegawai_log".
 */
class PresensiPegawaiLog extends BasePresensiPegawaiLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['waktu'], 'safe'],
            [['kodeta'], 'integer'],
            [['pegawai_id', 'nokartu', 'jenispresensi'], 'string', 'max' => 20],
            [['latitude', 'longitude', 'jarakpresensi', 'kodekelas'], 'string', 'max' => 50]
        ]);
    }
	
}
