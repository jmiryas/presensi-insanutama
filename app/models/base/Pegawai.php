<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "pegawai".
 *
 * @property string $pegawai_id
 * @property string $nik
 * @property string $nip
 * @property string $nama_pegawai
 * @property string $jeniskelamin_id
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $alamat
 * @property string $status_kawin
 * @property string $nama_pasangan
 * @property integer $sekolah_id
 * @property string $tmt
 * @property string $statuspegawai_id
 * @property integer $pangkatgolongan_id
 * @property integer $pendidikanpegawai_id
 * @property string $jurusan
 * @property string $nama_sekolah
 * @property string $sertifikasi
 * @property string $status_inpasing
 * @property string $jenispegawai_id
 * @property string $tugas_tambahan
 * @property string $kaderisasi_nu
 * @property string $foto_pegawai
 * @property string $nokartu_pegawai
 * @property string $pin_pegawai
 * @property integer $is_user
 * @property string $kodeguru
 * @property integer $gaji_pokok
 * @property integer $jabatanstruktural_id
 *
 * @property \app\models\CutiPegawaiData[] $cutiPegawaiDatas
 * @property \app\models\IzinPegawaiData[] $izinPegawaiDatas
 * @property \app\models\Jenispegawai $jenispegawai
 * @property \app\models\PresensiPegawaiLog[] $presensiPegawaiLogs
 */
class Pegawai extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            // 'cutiPegawaiDatas',
            // 'izinPegawaiDatas',
            // 'jenispegawai',
            // 'presensiPegawaiLogs'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pegawai_id', 'nik', 'nama_pegawai', 'jeniskelamin_id', 'tempat_lahir', 'tgl_lahir', 'alamat', 'status_kawin', 'sekolah_id'], 'required'],
            [['tgl_lahir', 'tmt'], 'safe'],
            [['sekolah_id', 'pangkatgolongan_id', 'pendidikanpegawai_id', 'gaji_pokok', 'jabatanstruktural_id'], 'integer'],
            [['pegawai_id', 'status_kawin', 'statuspegawai_id', 'foto_pegawai', 'nokartu_pegawai'], 'string', 'max' => 20],
            [['nik', 'nip', 'tugas_tambahan'], 'string', 'max' => 30],
            [['nama_pegawai', 'jurusan', 'nama_sekolah'], 'string', 'max' => 100],
            [['jeniskelamin_id', 'is_user'], 'string', 'max' => 1],
            [['tempat_lahir', 'nama_pasangan', 'sertifikasi'], 'string', 'max' => 50],
            [['alamat'], 'string', 'max' => 150],
            [['status_inpasing', 'jenispegawai_id', 'kaderisasi_nu', 'pin_pegawai'], 'string', 'max' => 10],
            [['kodeguru'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pegawai_id' => 'Pegawai ID',
            'nik' => 'Nik',
            'nip' => 'Nip',
            'nama_pegawai' => 'Nama Pegawai',
            'jeniskelamin_id' => 'Jeniskelamin ID',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'alamat' => 'Alamat',
            'status_kawin' => 'Status Kawin',
            'nama_pasangan' => 'Nama Pasangan',
            'sekolah_id' => 'Sekolah ID',
            'tmt' => 'Tmt',
            'statuspegawai_id' => 'Statuspegawai ID',
            'pangkatgolongan_id' => 'Pangkatgolongan ID',
            'pendidikanpegawai_id' => 'Pendidikanpegawai ID',
            'jurusan' => 'Jurusan',
            'nama_sekolah' => 'Nama Sekolah',
            'sertifikasi' => 'Sertifikasi',
            'status_inpasing' => 'Status Inpasing',
            'jenispegawai_id' => 'Jenispegawai ID',
            'tugas_tambahan' => 'Tugas Tambahan',
            'kaderisasi_nu' => 'Kaderisasi Nu',
            'foto_pegawai' => 'Foto Pegawai',
            'nokartu_pegawai' => 'Nokartu Pegawai',
            'pin_pegawai' => 'Pin Pegawai',
            'is_user' => 'Is User',
            'kodeguru' => 'Kodeguru',
            'gaji_pokok' => 'Gaji Pokok',
            'jabatanstruktural_id' => 'Jabatanstruktural ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCutiPegawaiDatas()
    {
        return $this->hasMany(CutiPegawaiData::className(), ['pegawai_id' => 'pegawai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPegawaiDatas()
    {
        return $this->hasMany(IzinPegawaiData::className(), ['pegawai_id' => 'pegawai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenispegawai()
    {
        return $this->hasOne(Jenispegawai::className(), ['jenispegawai_id' => 'jenispegawai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresensiPegawaiLogs()
    {
        return $this->hasMany(PresensiPegawaiLog::className(), ['pegawai_id' => 'pegawai_id']);
    }


    /**
     * @inheritdoc
     * @return \app\models\PegawaiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PegawaiQuery(get_called_class());
    }
}
