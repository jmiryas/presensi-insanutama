<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[IzinPegawaiJenisizin]].
 *
 * @see IzinPegawaiJenisizin
 */
class IzinPegawaiJenisizinQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return IzinPegawaiJenisizin[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return IzinPegawaiJenisizin|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
