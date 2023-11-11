<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\TechnicalHistory]].
 *
 * @see \common\models\TechnicalHistory
 */
class TechnicalHistoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\TechnicalHistory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\TechnicalHistory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
