<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "izin_pegawai_jenisizin".
 *
 * @property integer $jenisizin_id
 * @property string $nama_jenisizin
 *
 * @property \app\models\IzinPegawaiData[] $izinPegawaiDatas
 */
class IzinPegawaiJenisizin extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            'izinPegawaiDatas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_jenisizin'], 'required'],
            [['nama_jenisizin'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'izin_pegawai_jenisizin';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jenisizin_id' => 'Jenisizin ID',
            'nama_jenisizin' => 'Nama Jenisizin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPegawaiDatas()
    {
        return $this->hasMany(IzinPegawaiData::className(), ['jenisizin_id' => 'jenisizin_id']);
    }


    /**
     * @inheritdoc
     * @return \app\models\IzinPegawaiJenisizinQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\IzinPegawaiJenisizinQuery(get_called_class());
    }
}
