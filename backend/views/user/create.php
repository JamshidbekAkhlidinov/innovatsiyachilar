<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\User $model */

$this->title = Yii::t('app', 'Create User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create box box-body box-success">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
