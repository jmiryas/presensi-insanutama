<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PresensiPegawaiJenispresensi]].
 *
 * @see PresensiPegawaiJenispresensi
 */
class PresensiPegawaiJenispresensiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PresensiPegawaiJenispresensi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PresensiPegawaiJenispresensi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
