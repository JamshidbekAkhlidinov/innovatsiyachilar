<?php
/*
 *   Jamshidbek Akhlidinov
 *   2 - 10 2023 18:2:48
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\forms\auth;

use api\modules\v1\base\FormRequest;
use common\models\User;
use Yii;

/**
 * Signup form
 */
class SignupForm extends FormRequest
{
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $patronymic;
    public $full_name;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            //['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            [['first_name', 'last_name', 'patronymic', 'full_name'], 'string'],
        ];
    }

    public function getResult()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->email;
        $user->email = $this->email;
        $user->full_name = $this->full_name;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->patronymic = $this->patronymic;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        if ($user->save() && $this->sendEmail($user)) {
            return [
                'success' => true,
                'message' => "Checked your email address"
            ];
        }
        return $user;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected
    function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }

}
