<?php
/*
 *   Jamshidbek Akhlidinov
 *   2 - 10 2023 23:6:37
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\controllers;

use api\controllers\BaseController;
use api\modules\v1\modules\user\resources\UserResource;

class UserController extends BaseController
{
    public function actionProfile()
    {
        return UserResource::findOne(user()->identity->id);
    }
}