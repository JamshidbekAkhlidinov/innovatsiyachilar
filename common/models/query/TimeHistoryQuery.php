<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\TimeHistory]].
 *
 * @see \common\models\TimeHistory
 */
class TimeHistoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\TimeHistory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\TimeHistory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
