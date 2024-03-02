<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "izin_pegawai_data".
 *
 * @property integer $izin_id
 * @property integer $jenisizin_id
 * @property string $pegawai_id
 * @property string $keterangan_izin
 * @property string $tgl_pengajuanizin
 * @property string $tgl_awal
 * @property string $tgl_izin
 * @property string $tgl_akhir
 * @property string $tgl_setujuiizin
 * @property integer $jml_hari
 * @property string $pegawai_acc
 * @property string $bukti
 * @property string $statuspengajuan_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\IzinPegawaiJenisizin $jenisizin
 * @property \app\models\Statuspengajuan $statuspengajuan
 * @property \app\models\Pegawai $pegawai
 * @property \app\models\Pegawai $pegawaiAcc
 * @property \app\models\PresensiPegawaiData[] $presensiPegawaiDatas
 */
class IzinPegawaiData extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            // 'jenisizin',
            // 'statuspengajuan',
            // 'pegawai',
            // 'pegawaiAcc',
            // 'presensiPegawaiDatas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenisizin_id', 'keterangan_izin', 'tgl_pengajuanizin', 'tgl_awal', 'tgl_akhir', 'jml_hari', 'bukti'], 'required'],
            [['jenisizin_id', 'jml_hari'], 'integer'],
            [['tgl_pengajuanizin', 'tgl_awal', 'tgl_akhir', 'tgl_setujuiizin', 'created_at', 'updated_at'], 'safe'],
            [['pegawai_id', 'pegawai_acc', 'statuspengajuan_id'], 'string', 'max' => 20],
            [['keterangan_izin', 'bukti'], 'string', 'max' => 255],
            [['tgl_izin'], 'string', 'max' => 400]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        Yii::$app->session->set('tanggal_logbook_create', date('Y-m-d'));
        Yii::$app->session->get('tanggal_logbook_create', date('Y-m-d'));
        return 'izin_pegawai_data';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'izin_id' => 'Izin',
            'jenisizin_id' => 'Jenis izin',
            'pegawai_id' => 'Pegawai',
            'keterangan_izin' => 'Keterangan Izin',
            'tgl_pengajuanizin' => 'Tgl Pengajuan izin',
            'tgl_awal' => 'Tgl Awal',
            'tgl_izin' => 'Tgl Izin',
            'tgl_akhir' => 'Tgl Akhir',
            'tgl_setujuiizin' => 'Tgl Setujui izin',
            'jml_hari' => 'Jml Hari',
            'pegawai_acc' => 'Pegawai Acc',
            'bukti' => 'Bukti',
            'statuspengajuan_id' => 'Status pengajuan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisizin()
    {
        return $this->hasOne(IzinPegawaiJenisizin::className(), ['jenisizin_id' => 'jenisizin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatuspengajuan()
    {
        return $this->hasOne(Statuspengajuan::className(), ['statuspengajuan_id' => 'statuspengajuan_id']);
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
    public function getPegawaiAcc()
    {
        return $this->hasOne(Pegawai::className(), ['pegawai_id' => 'pegawai_acc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresensiPegawaiDatas()
    {
        return $this->hasMany(PresensiPegawaiData::className(), ['izin_id' => 'izin_id']);
    }


    /**
     * @inheritdoc
     * @return \app\models\IzinPegawaiDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\IzinPegawaiDataQuery(get_called_class());
    }
}
