<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "hari".
 *
 * @property string $kodehari
 * @property string $namahari
 * @property integer $nourut
 * @property integer $hari_id
 *
 * @property \app\models\PresensiSiswaJadwal[] $presensiSiswaJadwals
 */
class Hari extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            // 'presensiSiswaJadwals'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kodehari', 'hari_id'], 'required'],
            [['nourut', 'hari_id'], 'integer'],
            [['kodehari'], 'string', 'max' => 10],
            [['namahari'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hari';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kodehari' => 'Kodehari',
            'namahari' => 'Namahari',
            'nourut' => 'Nourut',
            'hari_id' => 'Hari ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresensiSiswaJadwals()
    {
        return $this->hasMany(PresensiSiswaJadwal::className(), ['kode_hari' => 'kodehari']);
    }


    /**
     * @inheritdoc
     * @return \app\models\HariQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\HariQuery(get_called_class());
    }
}
