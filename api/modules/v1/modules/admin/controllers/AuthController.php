<?php
/*
 *   Jamshidbek Akhlidinov
 *   8 - 10 2023 17:14:12
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\admin\controllers;


use api\controllers\BaseController;
use api\modules\v1\modules\admin\forms\LoginForm;

class AuthController extends BaseController
{

    public function actionLogin()
    {
        if (!user()->isGuest) {
            return translate("You need before logout");
        }

        $model = new LoginForm();
        return $this->sendResponse(
            $model,
            request()->post(),
        );
    }

    public function actionLogout()
    {
        if ($user = user()->identity) {
            $user->generateAuthKey();
            return $user->save();
        }
        return false;
    }
}
