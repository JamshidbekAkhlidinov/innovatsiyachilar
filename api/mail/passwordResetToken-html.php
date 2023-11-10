<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $user */

//$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['v1/user/auth/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>You were given a code number to reset the password:</p>

    <p><?= $user->password_reset_token ?></p>
</div>
