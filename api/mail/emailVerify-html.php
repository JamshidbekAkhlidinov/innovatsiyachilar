<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $user */

//$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['v1/user/auth/verify-email', 'token' => $user->verification_token]);
?>
<div class="verify-email">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>You were given a code number to confirm your email!</p>

    <code><?=$user->verification_token?></code>
</div>
