<?php
/*
 *   Jamshidbek Akhlidinov
 *   8 - 10 2023 16:10:43
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace backend\models;

use backend\modules\rbac\models\AuthItem;
use backend\modules\rbac\models\AuthRule;
use yii\helpers\ArrayHelper;

class ModelToData
{

    public static function getAuthItems()
    {
        return ArrayHelper::map(
            AuthItem::find()->all(),
            'name',
            'name',
        );
    }

    public static function getUsers()
    {
        return ArrayHelper::map(
            User::find()->all(),
            'id',
            'username',
        );
    }

    public static function getAuthRule()
    {
        return ArrayHelper::map(
            AuthRule::find()->all(),
            'name',
            'name',
        );
    }
}