<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \backend\forms\UserForm $model */

$this->title = Yii::t('app', 'Update User: {name}', [
    'name' => $model->user->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->id, 'url' => ['view', 'id' => $model->user->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
    <div class="user-update box box-body box-success">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
