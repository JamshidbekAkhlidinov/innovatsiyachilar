<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\TechnicalList $model */

$this->title = Yii::t('app', 'Create Technical List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Technical Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technical-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
