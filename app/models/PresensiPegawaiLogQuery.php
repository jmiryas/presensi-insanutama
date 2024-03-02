<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PresensiPegawaiLog]].
 *
 * @see PresensiPegawaiLog
 */
class PresensiPegawaiLogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PresensiPegawaiLog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PresensiPegawaiLog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
