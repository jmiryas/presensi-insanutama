<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PresensiSiswaLog]].
 *
 * @see PresensiSiswaLog
 */
class PresensiSiswaLogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PresensiSiswaLog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PresensiSiswaLog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
