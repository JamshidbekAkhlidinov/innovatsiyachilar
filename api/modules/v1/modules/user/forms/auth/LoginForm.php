<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 11:37:46
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\forms\auth;


use api\modules\v1\base\FormRequest;
use api\modules\v1\modules\user\resources\UserResource;

class LoginForm extends FormRequest
{
    public $email;

    public $password;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [
                ['email'],
                function ($attribute) {
                    $user = $this->findUser();

                    if ($user === null || !$user->validatePassword($this->password)) {
                        $this->addError(
                            $attribute,
                            translate("Email or password is not correct")
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
            'email' => $this->email,
            'status' => UserResource::STATUS_ACTIVE,
        ]);
    }

    public function getResult()
    {
        $user = $this->findUser();
        $user->generateAuthKey();
        $user->save();
        return [
            'token' => $user->auth_key,
        ];
    }
}