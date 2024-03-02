<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Jenispegawai]].
 *
 * @see Jenispegawai
 */
class JenispegawaiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Jenispegawai[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Jenispegawai|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
