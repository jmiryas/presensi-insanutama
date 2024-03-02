<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "cuti_pegawai_data".
 *
 * @property integer $cuti_id
 * @property integer $jeniscuti_id
 * @property string $pegawai_id
 * @property string $keterangan_cuti
 * @property string $domisili_cuti
 * @property string $nohp
 * @property string $tgl_pengajuancuti
 * @property string $tgl_awal
 * @property string $tgl_tidak_cuti
 * @property string $tgl_akhir
 * @property string $tgl_setujuicuti
 * @property integer $jml_hari
 * @property string $statuspengajuan_id
 * @property string $pegawai_acc
 * @property string $file_datadukung
 *
 * @property \app\models\CutiPegawaiJeniscuti $jeniscuti
 * @property \app\models\Pegawai $pegawai
 * @property \app\models\CutiPegawaiDetail[] $cutiPegawaiDetails
 * @property \app\models\PresensiPegawaiData[] $presensiPegawaiDatas
 */
class CutiPegawaiData extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            // 'jeniscuti',
            // 'pegawai',
            // 'cutiPegawaiDetails',
            // 'presensiPegawaiDatas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pegawai_id', 'jeniscuti_id', 'keterangan_cuti', 'nohp', 'tgl_pengajuancuti', 'tgl_awal', 'tgl_akhir', 'jml_hari'], 'required'],
            [['jeniscuti_id', 'jml_hari'], 'integer'],
            [['tgl_pengajuancuti', 'tgl_awal', 'tgl_akhir', 'tgl_setujuicuti', 'domisili_cuti', 'created_at', 'updated_at'], 'safe'],
            [['pegawai_id', 'statuspengajuan_id', 'pegawai_acc', 'file_datadukung'], 'string', 'max' => 20],
            [['keterangan_cuti'], 'string', 'max' => 255],
            [['domisili_cuti'], 'string', 'max' => 50],
            [['nohp'], 'string', 'max' => 15],
            [['tgl_tidak_cuti'], 'string', 'max' => 400]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuti_pegawai_data';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cuti_id' => 'Cuti',
            'jeniscuti_id' => 'Jenis cuti',
            'pegawai_id' => 'Pegawai',
            'keterangan_cuti' => 'Keterangan Cuti',
            'domisili_cuti' => 'Domisili Cuti',
            'nohp' => 'Nohp',
            'tgl_pengajuancuti' => 'Tanggal Pengajuan cuti',
            'tgl_awal' => 'Tanggal Awal',
            'tgl_tidak_cuti' => 'Tanggal Tidak Cuti',
            'tgl_akhir' => 'Tanggal Akhir',
            'tgl_setujuicuti' => 'Tanggal Setujui cuti',
            'jml_hari' => 'Total Jumlah Hari',
            'statuspengajuan_id' => 'Status pengajuan',
            'pegawai_acc' => 'Pegawai Acc',
            'file_datadukung' => 'File Datadukung',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJeniscuti()
    {
        return $this->hasOne(CutiPegawaiJeniscuti::className(), ['jeniscuti_id' => 'jeniscuti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['pegawai_id' => 'pegawai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCutiPegawaiDetails()
    {
        return $this->hasMany(CutiPegawaiDetail::className(), ['cuti_id' => 'cuti_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresensiPegawaiDatas()
    {
        return $this->hasMany(PresensiPegawaiData::className(), ['cuti_id' => 'cuti_id']);
    }


    /**
     * @inheritdoc
     * @return \app\models\CutiPegawaiDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CutiPegawaiDataQuery(get_called_class());
    }
}
