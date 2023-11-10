<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

//$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['v1/user/auth/verify-email', 'token' => $user->verification_token]);
?>
Hello <?= $user->username ?>,

You were given a code number to confirm your email!

<?=$user->verification_token?>
