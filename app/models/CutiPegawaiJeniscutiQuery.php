<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CutiPegawaiJeniscuti]].
 *
 * @see CutiPegawaiJeniscuti
 */
class CutiPegawaiJeniscutiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return CutiPegawaiJeniscuti[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CutiPegawaiJeniscuti|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
