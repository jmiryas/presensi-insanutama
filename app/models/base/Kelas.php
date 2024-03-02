<?php

namespace app\models\base;

use app\modules\UserManagement\models\User;
use Yii;

/**
 * This is the base model class for table "kelas".
 *
 * @property string $kodekelas
 * @property string $kodejenjang
 * @property string $kodekelompok
 * @property string $namakelas
 * @property integer $isaktif
 * @property string $nik
 * @property string $kodewalikelas
 *
 * @property \app\models\Historykelas[] $historykelas
 */
class Kelas extends \yii\db\ActiveRecord
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
            [['kodekelas'], 'required'],
            [['kodekelas', 'namakelas', 'kodewalikelas'], 'string', 'max' => 50],
            [['kodejenjang'], 'string', 'max' => 2],
            [['kodekelompok'], 'string', 'max' => 5],
            [['isaktif'], 'string', 'max' => 1],
            [['nik'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kodekelas' => 'Kodekelas',
            'kodejenjang' => 'Kodejenjang',
            'kodekelompok' => 'Kodekelompok',
            'namakelas' => 'Namakelas',
            'isaktif' => 'Isaktif',
            'nik' => 'Nik',
            'kodewalikelas' => 'Kodewalikelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorykelas()
    {
        // User::hasRole('a');
        // echo '<pre>';
        // print_r();
        // echo '</pre>';
        // die;
        return $this->hasMany(Historykelas::className(), ['kodekelas' => 'kodekelas']);
    }


    /**
     * @inheritdoc
     * @return \app\models\KelasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\KelasQuery(get_called_class());
    }
}
