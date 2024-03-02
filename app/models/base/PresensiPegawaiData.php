<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "presensi_pegawai_data".
 *
 * @property string $presensi_id
 * @property string $jadwalpresensi_id
 * @property string $pegawai_id
 * @property string $tgl
 * @property string $hari
 * @property string $status_berangkat
 * @property string $status_pulang
 * @property integer $cuti_id
 * @property integer $izin_id
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
 * @property \app\models\PresensiPegawaiJadwal $jadwalpresensi
 * @property \app\models\PresensiPegawaiLog $logmasuk
 * @property \app\models\PresensiPegawaiLog $logpulang
 * @property \app\models\CutiPegawaiData $cuti
 * @property \app\models\IzinPegawaiData $izin
 */
class PresensiPegawaiData extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'jadwalpresensi',
            'logmasuk',
            'logpulang',
            'cuti',
            'izin'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jadwalpresensi_id', 'pegawai_id', 'tgl', 'hari'], 'required'],
            [['tgl', 'jam_masuk', 'jam_pulang', 'created_at', 'updated_at'], 'safe'],
            [['status_berangkat', 'status_pulang', 'keterangan'], 'string'],
            [['cuti_id', 'izin_id', 'logmasuk_id', 'logpulang_id', 'kodeta'], 'integer'],
            [['jadwalpresensi_id', 'nokartu'], 'string', 'max' => 20],
            [['pegawai_id'], 'string', 'max' => 25],
            [['hari'], 'string', 'max' => 10],
            [['latitude', 'longitude', 'kodekelas', 'generate_id'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presensi_pegawai_data';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'presensi_id' => 'Presensi ID',
            'jadwalpresensi_id' => 'Jadwalpresensi ID',
            'pegawai_id' => 'Pegawai ID',
            'tgl' => 'Tgl',
            'hari' => 'Hari',
            'status_berangkat' => 'Status Berangkat',
            'status_pulang' => 'Status Pulang',
            'cuti_id' => 'Cuti ID',
            'izin_id' => 'Izin ID',
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
        return $this->hasOne(\app\models\PresensiPegawaiJadwal::className(), ['jadwalpresensi_id' => 'jadwalpresensi_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogmasuk()
    {
        return $this->hasOne(\app\models\PresensiPegawaiLog::className(), ['logpresensi_id' => 'logmasuk_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogpulang()
    {
        return $this->hasOne(\app\models\PresensiPegawaiLog::className(), ['logpresensi_id' => 'logpulang_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuti()
    {
        return $this->hasOne(\app\models\CutiPegawaiData::className(), ['cuti_id' => 'cuti_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzin()
    {
        return $this->hasOne(\app\models\IzinPegawaiData::className(), ['izin_id' => 'izin_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\PresensiPegawaiDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PresensiPegawaiDataQuery(get_called_class());
    }
}
