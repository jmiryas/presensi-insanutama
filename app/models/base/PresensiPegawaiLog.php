<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "presensi_pegawai_log".
 *
 * @property integer $logpresensi_id
 * @property string $waktu
 * @property string $pegawai_id
 * @property string $nokartu
 * @property string $latitude
 * @property string $longitude
 * @property string $jarakpresensi
 * @property integer $kodeta
 * @property string $kodekelas
 * @property string $jenispresensi
 *
 * @property \app\models\PresensiPegawaiData[] $presensiPegawaiDatas
 * @property \app\models\Pegawai $pegawai
 */
class PresensiPegawaiLog extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'presensiPegawaiDatas',
            'pegawai'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['waktu'], 'safe'],
            [['kodeta'], 'integer'],
            [['pegawai_id', 'nokartu', 'jenispresensi'], 'string', 'max' => 20],
            [['latitude', 'longitude', 'jarakpresensi', 'kodekelas'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presensi_pegawai_log';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'logpresensi_id' => 'Logpresensi ID',
            'waktu' => 'Waktu',
            'pegawai_id' => 'Pegawai ID',
            'nokartu' => 'Nokartu',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'jarakpresensi' => 'Jarakpresensi',
            'kodeta' => 'Kodeta',
            'kodekelas' => 'Kodekelas',
            'jenispresensi' => 'Jenispresensi',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresensiPegawaiDatas()
    {
        return $this->hasMany(\app\models\PresensiPegawaiData::className(), ['logpulang_id' => 'logpresensi_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(\app\models\Pegawai::className(), ['pegawai_id' => 'pegawai_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\PresensiPegawaiLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PresensiPegawaiLogQuery(get_called_class());
    }
}
