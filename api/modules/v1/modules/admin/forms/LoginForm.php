<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 11:37:46
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\admin\forms;


use api\modules\v1\base\FormRequest;
use api\modules\v1\modules\user\resources\UserResource;
use common\enums\UserRolesEnum;
use yii\web\ForbiddenHttpException;

class LoginForm extends FormRequest
{
    public $username;

    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [
                ['username'],
                function ($attribute) {
                    $user = $this->findUser();

                    if ($user === null || !$user->validatePassword($this->password)) {
                        $this->addError(
                            $attribute,
                            translate("Username or password is not correct")
                        );
                        return;
                    }
                }
            ]
        ];
    }

    public function findUser()
    {
        return UserResource::findOne([
            'username' => $this->username,
            'status' => UserResource::STATUS_ACTIVE,
        ]);
    }

    /**
     * @throws ForbiddenHttpException
     */
    public function getResult()
    {
        $user = $this->findUser();
        user()->setIdentity($user);
        if (user()->can(UserRolesEnum::ROLE_ADMINISTRATOR)) {
            $user->generateAuthKey();
            $user->save();
            return [
                'token' => $user->auth_key,
            ];
        }
        throw new ForbiddenHttpException('You are not allowed to access this page.');
    }
}