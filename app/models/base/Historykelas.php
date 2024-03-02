<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "historykelas".
 *
 * @property integer $kodehistory
 * @property string $kodestatus
 * @property string $kodekelas
 * @property integer $kodeta
 * @property string $nis
 * @property string $isaktif
 *
 * @property \app\models\Tahunajaran $kodeta0
 * @property \app\models\Siswa $nis0
 */
class Historykelas extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            // 'kodeta0',
            // 'nis0'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kodeta'], 'integer'],
            [['isaktif'], 'string'],
            [['kodestatus'], 'string', 'max' => 2],
            [['kodekelas'], 'string', 'max' => 50],
            [['nis'], 'string', 'max' => 20],
            [['kodeta', 'nis'], 'unique', 'targetAttribute' => ['kodeta', 'nis'], 'message' => 'The combination of Kodeta and Nis has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'historykelas';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kodehistory' => 'Kodehistory',
            'kodestatus' => 'Kodestatus',
            'kodekelas' => 'Kodekelas',
            'kodeta' => 'Kodeta',
            'nis' => 'Nis',
            'isaktif' => 'Isaktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeta0()
    {
        return $this->hasOne(Tahunajaran::className(), ['kodeta' => 'kodeta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNis0()
    {
        return $this->hasOne(Siswa::className(), ['nis' => 'nis']);
    }


    /**
     * @inheritdoc
     * @return \app\models\HistorykelasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\HistorykelasQuery(get_called_class());
    }
}
