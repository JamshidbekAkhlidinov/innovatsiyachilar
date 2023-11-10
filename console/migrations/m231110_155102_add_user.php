<?php

use common\enums\UserRolesEnum;
use common\models\User;
use yii\db\Migration;

/**
 * Class m231110_155102_add_user
 */
class m231110_155102_add_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        foreach (UserRolesEnum::ALL as $key => $value) {
            try {
                $user = new User();
                $user->username = $key;
                $user->email = $key . "@gmail.com";
                $user->status = User::STATUS_ACTIVE;
                $user->setPassword($key);
                $user->generateAuthKey();
                if ($user->save()) {
                    $role = $auth->createRole($key);
                    $auth->add($role);
                    if ($auth->assign($role, $user->id)) {
                        echo "\nok: " . $value;
                    }
                }
            } catch (Exception $e) {
                echo $e->getMessage() . "\n";
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        foreach (UserRolesEnum::ALL as $key => $value) {
            try {
                if ($user = User::findOne(['username' => $key])) {
                    $auth->removeAll();
                    $user->delete();
               }
            } catch (Exception $e) {
                echo $e->getMessage() . "\n";
            }
        }
    }
}
