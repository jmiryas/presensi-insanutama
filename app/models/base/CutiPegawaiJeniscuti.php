<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "cuti_pegawai_jeniscuti".
 *
 * @property integer $jeniscuti_id
 * @property string $nama_jeniscuti
 *
 * @property \app\models\CutiPegawaiData[] $cutiPegawaiDatas
 */
class CutiPegawaiJeniscuti extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            // 'cutiPegawaiDatas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_jeniscuti'], 'required'],
            [['nama_jeniscuti'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuti_pegawai_jeniscuti';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jeniscuti_id' => 'Jeniscuti ID',
            'nama_jeniscuti' => 'Nama Jeniscuti',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCutiPegawaiDatas()
    {
        return $this->hasMany(CutiPegawaiData::className(), ['jeniscuti_id' => 'jeniscuti_id']);
    }


    /**
     * @inheritdoc
     * @return \app\models\CutiPegawaiJeniscutiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CutiPegawaiJeniscutiQuery(get_called_class());
    }
}
