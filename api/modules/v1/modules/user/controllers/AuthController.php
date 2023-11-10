<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 11:37:46
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\controllers;


use api\controllers\BaseController;
use api\modules\v1\modules\user\forms\auth\LoginForm;
use api\modules\v1\modules\user\forms\auth\PasswordResetRequestForm;
use api\modules\v1\modules\user\forms\auth\ResendVerificationEmailForm;
use api\modules\v1\modules\user\forms\auth\ResetPasswordForm;
use api\modules\v1\modules\user\forms\auth\SignupForm;
use api\modules\v1\modules\user\forms\auth\VerifyEmailForm;
use InvalidArgumentException;
use yii\web\BadRequestHttpException;

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


    public function actionSignup()
    {
        $model = new SignupForm();

        return $this->sendResponse(
            $model,
            request()->post(),
        );
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        return $this->sendResponse(
            $model,
            request()->post(),
        );
    }

    public function actionResetPassword($code)
    {
        try {
            $model = new ResetPasswordForm($code);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        return $this->sendResponse(
            $model,
            request()->post()
        );
    }

    public function actionVerifyEmail($code)
    {
        try {
            $model = new VerifyEmailForm($code);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        return $this->sendResponse(
            $model,
            request()->post(),
        );
    }


    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();

        return $this->sendResponse(
            $model,
            request()->post(),
        );
    }
}
