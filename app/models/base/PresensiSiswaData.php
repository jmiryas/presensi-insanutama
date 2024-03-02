<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "presensi_siswa_data".
 *
 * @property string $presensi_id
 * @property string $jadwalpresensi_id
 * @property string $nis
 * @property string $tgl
 * @property string $hari
 * @property string $status_kehadiran
 * @property string $jam_masuk
 * @property string $jam_pulang
 * @property integer $logmasuk_id
 * @property integer $logpulang_id
 * @property string $nokartu
 * @property string $latitude
 * @property string $longitude
 * @property string $keterangan
 * @property integer $kodeta
 * @property string $kodekelas
 * @property string $generate_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\PresensiSiswaJadwal $jadwalpresensi
 * @property \app\models\Siswa $nis0
 * @property \app\models\PresensiSiswaLog $logmasuk
 * @property \app\models\PresensiSiswaLog $logpulang
 */
class PresensiSiswaData extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    const SCENARIO_MANUAL = 'manual';

    public $tempvar;

    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            // 'jadwalpresensi',
            // 'nis0',
            // 'logmasuk',
            // 'logpulang'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jadwalpresensi_id', 'nis', 'tgl', 'hari'], 'required'],
            [['tgl', 'jam_masuk', 'jam_pulang', 'created_at', 'updated_at'], 'safe'],
            [['status_kehadiran', 'keterangan'], 'string'],
            [['logmasuk_id', 'logpulang_id', 'kodeta'], 'integer'],
            [['jadwalpresensi_id', 'nokartu'], 'string', 'max' => 20],
            [['nis'], 'string', 'max' => 25],
            [['hari'], 'string', 'max' => 10],
            [['latitude', 'longitude', 'kodekelas', 'generate_id'], 'string', 'max' => 50],
            [['keterangan', 'status_kehadiran'], 'required', 'on' => self::SCENARIO_MANUAL],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presensi_siswa_data';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'presensi_id' => 'Presensi ID',
            'jadwalpresensi_id' => 'Jadwalpresensi ID',
            'nis' => 'Nis',
            'tgl' => 'Tgl',
            'hari' => 'Hari',
            'status_kehadiran' => 'Status Kehadiran',
            'jam_masuk' => 'Jam Masuk',
            'jam_pulang' => 'Jam Pulang',
            'logmasuk_id' => 'Logmasuk ID',
            'logpulang_id' => 'Logpulang ID',
            'nokartu' => 'Nokartu',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'keterangan' => 'Keterangan',
            'kodeta' => 'Kodeta',
            'kodekelas' => 'Kodekelas',
            'generate_id' => 'Generate ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwalpresensi()
    {
        return $this->hasOne(PresensiSiswaJadwal::className(), ['jadwalpresensi_id' => 'jadwalpresensi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNis0()
    {
        return $this->hasOne(Siswa::className(), ['nis' => 'nis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogmasuk()
    {
        return $this->hasOne(PresensiSiswaLog::className(), ['logpresensi_id' => 'logmasuk_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogpulang()
    {
        return $this->hasOne(PresensiSiswaLog::className(), ['logpresensi_id' => 'logpulang_id']);
    }


    /**
     * @inheritdoc
     * @return \app\models\PresensiSiswaDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PresensiSiswaDataQuery(get_called_class());
    }
}
