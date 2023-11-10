<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

//$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['v1/user/auth/reset-password', 'token' => $user->password_reset_token]);
?>
Hello <?= $user->username ?>,

You were given a code number to reset the password:

<?= $user->password_reset_token ?>
$resetLink