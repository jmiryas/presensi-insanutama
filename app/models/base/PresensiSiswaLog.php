<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "presensi_siswa_log".
 *
 * @property integer $logpresensi_id
 * @property string $waktu
 * @property string $nis
 * @property string $nokartu
 * @property string $latitude
 * @property string $longitude
 * @property string $jarakpresensi
 * @property integer $kodeta
 * @property string $kodekelas
 *
 * @property \app\models\PresensiSiswaData[] $presensiSiswaDatas
 * @property \app\models\Siswa $nis0
 */
class PresensiSiswaLog extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            // 'presensiSiswaDatas',
            // 'nis0'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['waktu'], 'safe'],
            [['latitude', 'longitude'], 'safe'],
            [['kodeta'], 'integer'],
            [['nis', 'nokartu', 'jenispresensi'], 'string', 'max' => 20],
            [['latitude', 'longitude', 'jarakpresensi', 'kodekelas'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presensi_siswa_log';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'logpresensi_id' => 'Logpresensi ID',
            'waktu' => 'Waktu',
            'nis' => 'Nis',
            'nokartu' => 'Nokartu',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'jarakpresensi' => 'Jarakpresensi',
            'kodeta' => 'Kodeta',
            'kodekelas' => 'Kodekelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresensiSiswaDatas()
    {
        return $this->hasMany(PresensiSiswaData::className(), ['logpulang_id' => 'logpresensi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNis0()
    {
        return $this->hasOne(Siswa::className(), ['nis' => 'nis']);
    }


    /**
     * @inheritdoc
     * @return \app\models\PresensiSiswaLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PresensiSiswaLogQuery(get_called_class());
    }
}
