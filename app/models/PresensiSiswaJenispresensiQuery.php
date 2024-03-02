<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PresensiSiswaJenispresensi]].
 *
 * @see PresensiSiswaJenispresensi
 */
class PresensiSiswaJenispresensiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PresensiSiswaJenispresensi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PresensiSiswaJenispresensi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
