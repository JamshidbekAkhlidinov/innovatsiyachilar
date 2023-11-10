<?php

namespace backend\modules\rbac\query;

/**
 * This is the ActiveQuery class for [[\backend\modules\rbac\models\AuthItemChild]].
 *
 * @see \backend\modules\rbac\models\AuthItemChild
 */
class AuthItemChildQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\modules\rbac\models\AuthItemChild[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\rbac\models\AuthItemChild|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
