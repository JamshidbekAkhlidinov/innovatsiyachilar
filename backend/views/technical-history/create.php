<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TechnicalHistory $model */

$this->title = Yii::t('app', 'Create Technical History');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Technical Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technical-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
