<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PresensiSiswaJadwal]].
 *
 * @see PresensiSiswaJadwal
 */
class PresensiSiswaJadwalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PresensiSiswaJadwal[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PresensiSiswaJadwal|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
