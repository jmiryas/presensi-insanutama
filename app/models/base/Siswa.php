<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "siswa".
 *
 * @property string $nis
 * @property integer $idasalsekolah
 * @property integer $kodejk
 * @property string $kodejeniskeringanan
 * @property string $nama
 * @property string $panggilan
 * @property string $tempatlahir
 * @property string $tgllahir
 * @property string $tahunmasuk
 * @property string $namabapak
 * @property string $namaibu
 * @property string $alamat
 * @property string $notelpon
 * @property string $namaori
 * @property string $templatefinger
 * @property string $nokartu
 * @property string $kelas_id
 * @property string $longit
 * @property string $latit
 * @property string $adress
 * @property string $pin
 * @property string $kamar_id
 * @property string $profil
 * @property string $kamar
 * @property string $asrama
 * @property string $lokasi_asrama
 * @property string $kodeAsrama
 * @property integer $status_ketua_kamar
 * @property string $tgl_mapping
 * @property string $foto
 * @property string $nisn
 *
 * @property \app\models\Historykelas[] $historykelas
 * @property \app\models\PresensiSiswaData[] $presensiSiswaDatas
 * @property \app\models\PresensiSiswaLog[] $presensiSiswaLogs
 */
class Siswa extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            // 'historykelas',
            // 'presensiSiswaDatas',
            // 'presensiSiswaLogs'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nis'], 'required'],
            [['idasalsekolah', 'kodejk'], 'integer'],
            [['tgllahir', 'tgl_mapping'], 'safe'],
            [['templatefinger', 'longit', 'latit', 'adress', 'profil'], 'string'],
            [['nis', 'kamar_id', 'lokasi_asrama', 'kodeAsrama', 'nisn'], 'string', 'max' => 20],
            [['kodejeniskeringanan'], 'string', 'max' => 2],
            [['nama', 'namabapak', 'namaibu', 'namaori', 'asrama'], 'string', 'max' => 100],
            [['panggilan'], 'string', 'max' => 30],
            [['tempatlahir', 'notelpon', 'nokartu', 'kelas_id'], 'string', 'max' => 50],
            [['tahunmasuk'], 'string', 'max' => 4],
            [['alamat', 'foto'], 'string', 'max' => 255],
            [['pin'], 'string', 'max' => 6],
            [['kamar'], 'string', 'max' => 25],
            [['status_ketua_kamar'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'siswa';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nis' => 'Nis',
            'idasalsekolah' => 'Idasalsekolah',
            'kodejk' => 'Jenis Kelamin',
            'kodejeniskeringanan' => 'Kodejeniskeringanan',
            'nama' => 'Nama',
            'panggilan' => 'Panggilan',
            'tempatlahir' => 'Tempatlahir',
            'tgllahir' => 'Tgllahir',
            'tahunmasuk' => 'Tahunmasuk',
            'namabapak' => 'Namabapak',
            'namaibu' => 'Namaibu',
            'alamat' => 'Alamat',
            'notelpon' => 'Notelpon',
            'namaori' => 'Namaori',
            'templatefinger' => 'Templatefinger',
            'nokartu' => 'Nokartu',
            'kelas_id' => 'Kelas ID',
            'longit' => 'Longit',
            'latit' => 'Latit',
            'adress' => 'Adress',
            'pin' => 'Pin',
            'kamar_id' => 'Kamar ID',
            'profil' => 'Profil',
            'kamar' => 'Kamar',
            'asrama' => 'Asrama',
            'lokasi_asrama' => 'Lokasi Asrama',
            'kodeAsrama' => 'Kode Asrama',
            'status_ketua_kamar' => 'Status Ketua Kamar',
            'tgl_mapping' => 'Tgl Mapping',
            'foto' => 'Foto',
            'nisn' => 'Nisn',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorykelas()
    {
        return $this->hasMany(Historykelas::className(), ['nis' => 'nis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresensiSiswaDatas()
    {
        return $this->hasMany(PresensiSiswaData::className(), ['nis' => 'nis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresensiSiswaLogs()
    {
        return $this->hasMany(PresensiSiswaLog::className(), ['nis' => 'nis']);
    }


    /**
     * @inheritdoc
     * @return \app\models\SiswaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SiswaQuery(get_called_class());
    }
}
