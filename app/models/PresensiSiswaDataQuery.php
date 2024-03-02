<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PresensiSiswaData]].
 *
 * @see PresensiSiswaData
 */
class PresensiSiswaDataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PresensiSiswaData[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PresensiSiswaData|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
