<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "presensi_pegawai_jenispresensi".
 *
 * @property string $jenispresensi
 *
 * @property \app\models\PresensiPegawaiJadwal[] $presensiPegawaiJadwals
 */
class PresensiPegawaiJenispresensi extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'presensiPegawaiJadwals'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenispresensi'], 'required'],
            [['jenispresensi'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presensi_pegawai_jenispresensi';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jenispresensi' => 'Jenispresensi',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresensiPegawaiJadwals()
    {
        return $this->hasMany(\app\models\PresensiPegawaiJadwal::className(), ['jenispresensi' => 'jenispresensi']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\PresensiPegawaiJenispresensiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PresensiPegawaiJenispresensiQuery(get_called_class());
    }
}
