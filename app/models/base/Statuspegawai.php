<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "statuspegawai".
 *
 * @property string $statuspegawai_id
 * @property string $statuspegawai
 *
 * @property \app\models\Pegawai[] $pegawais
 */
class Statuspegawai extends \yii\db\ActiveRecord
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
            [['statuspegawai_id', 'statuspegawai'], 'required'],
            [['statuspegawai_id'], 'string', 'max' => 20],
            [['statuspegawai'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statuspegawai';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'statuspegawai_id' => 'Statuspegawai ID',
            'statuspegawai' => 'Statuspegawai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawais()
    {
        return $this->hasMany(Pegawai::className(), ['statuspegawai_id' => 'statuspegawai_id']);
    }


    /**
     * @inheritdoc
     * @return \app\models\StatuspegawaiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\StatuspegawaiQuery(get_called_class());
    }
}
