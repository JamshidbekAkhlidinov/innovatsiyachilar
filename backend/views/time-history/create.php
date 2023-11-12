<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TimeHistory $model */

$this->title = Yii::t('app', 'Create Time History');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Time Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="time-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
