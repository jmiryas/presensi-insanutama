<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "presensi_siswa_jadwal".
 *
 * @property string $jadwalpresensi_id
 * @property string $jenispresensi
 * @property string $kode_hari
 * @property string $jadwal_masuk
 * @property string $jadwal_pulang
 * @property string $batas_awal_masuk
 * @property string $batas_akhir_masuk
 * @property string $batas_awal_pulang
 * @property string $batas_akhir_pulang
 * @property integer $isaktif
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\PresensiSiswaData[] $presensiSiswaDatas
 * @property \app\models\Hari $kodeHari
 */
class PresensiSiswaJadwal extends \yii\db\ActiveRecord
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
            // 'kodeHari'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jadwalpresensi_id', 'jenispresensi', 'kode_hari', 'jadwal_masuk', 'jadwal_pulang', 'batas_awal_masuk', 'batas_akhir_masuk', 'batas_awal_pulang', 'batas_akhir_pulang'], 'required'],
            [['jadwal_masuk', 'jadwal_pulang', 'batas_awal_masuk', 'batas_akhir_masuk', 'batas_awal_pulang', 'batas_akhir_pulang', 'created_at', 'updated_at'], 'safe'],
            [['isaktif'], 'string'],
            [['jadwalpresensi_id'], 'string', 'max' => 20],
            [['jenispresensi'], 'string', 'max' => 10],
            [['kode_hari'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presensi_siswa_jadwal';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jadwalpresensi_id' => 'Kode Jadwal Presensi',
            'jenispresensi' => 'Jenis Presensi',
            'kode_hari' => 'Kode Hari',
            'jadwal_masuk' => 'Jadwal Masuk',
            'jadwal_pulang' => 'Jadwal Pulang',
            'batas_awal_masuk' => 'Batas Awal Masuk',
            'batas_akhir_masuk' => 'Batas Akhir Masuk',
            'batas_awal_pulang' => 'Batas Awal Pulang',
            'batas_akhir_pulang' => 'Batas Akhir Pulang',
            'isaktif' => 'Isaktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresensiSiswaDatas()
    {
        return $this->hasMany(PresensiSiswaData::className(), ['jadwalpresensi_id' => 'jadwalpresensi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeHari()
    {
        return $this->hasOne(Hari::className(), ['kodehari' => 'kode_hari']);
    }


    /**
     * @inheritdoc
     * @return \app\models\PresensiSiswaJadwalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PresensiSiswaJadwalQuery(get_called_class());
    }
}
