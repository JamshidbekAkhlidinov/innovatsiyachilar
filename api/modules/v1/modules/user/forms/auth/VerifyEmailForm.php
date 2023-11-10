<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 11:37:46
 *   https://github.com/JamshidbekAkhlidinov
 */

/*
 *   Jamshidbek Akhlidinov
 *   2 - 10 2023 18:2:48
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\forms\auth;

use api\modules\v1\base\BaseRequest;
use common\models\User;
use yii\base\InvalidArgumentException;
use yii\web\HttpException;

class VerifyEmailForm extends BaseRequest
{
    /**
     * @var string
     */
    public $token;

    /**
     * @var User
     */
    private $_user;


    /**
     * Creates a form model with given token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws InvalidArgumentException if token is empty or not valid
     */
    public function __construct($token, array $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new HttpException(422,'Verify email token cannot be blank.');
        }
        $this->_user = User::findByVerificationToken($token);
        if (!$this->_user) {
            throw new HttpException(422,'Wrong verify email token.');
        }
        parent::__construct($config);
    }

    public function getResult()
    {
        $user = $this->_user;
        $user->status = User::STATUS_ACTIVE;
        $isSave = $user->save(false) ? $user : null;
        if ($isSave) {
            return [
                'token' => $user->auth_key,
            ];
        }
        return $user;
    }
}

