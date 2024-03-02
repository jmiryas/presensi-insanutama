<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Statuspengajuan]].
 *
 * @see Statuspengajuan
 */
class StatuspengajuanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Statuspengajuan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Statuspengajuan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
