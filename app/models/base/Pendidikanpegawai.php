<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "pendidikanpegawai".
 *
 * @property integer $pendidikanpegawai_id
 * @property string $pegawai_id
 * @property string $ket_pendidikan
 * @property string $jenjang
 * @property integer $is_aktif
 *
 * @property \app\models\Pegawai[] $pegawais
 */
class Pendidikanpegawai extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            // 'pegawais'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenjang', 'ket_pendidikan',], 'required'],
            [['jenjang'], 'string'],
            [['pegawai_id'], 'string', 'max' => 20],
            [['ket_pendidikan'], 'string', 'max' => 250],
            [['is_aktif'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pendidikanpegawai';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pendidikanpegawai_id' => 'Pendidikanpegawai ID',
            'pegawai_id' => 'Pegawai ID',
            'ket_pendidikan' => 'Ket Pendidikan',
            'jenjang' => 'Jenjang',
            'is_aktif' => 'Is Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawais()
    {
        return $this->hasMany(Pegawai::className(), ['pendidikanpegawai_id' => 'pendidikanpegawai_id']);
    }


    /**
     * @inheritdoc
     * @return \app\models\PendidikanpegawaiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PendidikanpegawaiQuery(get_called_class());
    }
}
