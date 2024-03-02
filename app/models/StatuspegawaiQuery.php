<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Statuspegawai]].
 *
 * @see Statuspegawai
 */
class StatuspegawaiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Statuspegawai[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Statuspegawai|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
