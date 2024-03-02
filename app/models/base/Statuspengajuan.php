<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "statuspengajuan".
 *
 * @property string $statuspengajuan_id
 * @property string $ket_statuspengajuan
 *
 * @property \app\models\CutiPegawaiData[] $cutiPegawaiDatas
 * @property \app\models\IzinPegawaiData[] $izinPegawaiDatas
 */
class Statuspengajuan extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'cutiPegawaiDatas',
            'izinPegawaiDatas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statuspengajuan_id'], 'required'],
            [['statuspengajuan_id'], 'string', 'max' => 20],
            [['ket_statuspengajuan'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statuspengajuan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'statuspengajuan_id' => 'Statuspengajuan ID',
            'ket_statuspengajuan' => 'Ket Statuspengajuan',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCutiPegawaiDatas()
    {
        return $this->hasMany(\app\models\CutiPegawaiData::className(), ['statuspengajuan_id' => 'statuspengajuan_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzinPegawaiDatas()
    {
        return $this->hasMany(\app\models\IzinPegawaiData::className(), ['statuspengajuan_id' => 'statuspengajuan_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\StatuspengajuanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\StatuspengajuanQuery(get_called_class());
    }
}
