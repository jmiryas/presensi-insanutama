<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "tahunajaran".
 *
 * @property integer $kodeta
 * @property string $namata
 * @property integer $isaktif
 *
 * @property \app\models\Historykelas[] $historykelas
 */
class Tahunajaran extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            // 'historykelas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['namata'], 'string', 'max' => 20],
            [['isaktif'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tahunajaran';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kodeta' => 'Kodeta',
            'namata' => 'Namata',
            'isaktif' => 'Isaktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorykelas()
    {
        return $this->hasMany(Historykelas::className(), ['kodeta' => 'kodeta']);
    }


    /**
     * @inheritdoc
     * @return \app\models\TahunajaranQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TahunajaranQuery(get_called_class());
    }
}
