<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "presensi_siswa_jenispresensi".
 *
 * @property string $jenispresensi
 *
 * @property \app\models\PresensiSiswaJadwal[] $presensiSiswaJadwals
 */
class PresensiSiswaJenispresensi extends \yii\db\ActiveRecord
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
            [['jenispresensi'], 'required'],
            [['jenispresensi'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presensi_siswa_jenispresensi';
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
    public function getPresensiSiswaJadwals()
    {
        return $this->hasMany(PresensiSiswaJadwal::className(), ['jenispresensi' => 'jenispresensi']);
    }


    /**
     * @inheritdoc
     * @return \app\models\PresensiSiswaJenispresensiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PresensiSiswaJenispresensiQuery(get_called_class());
    }
}
