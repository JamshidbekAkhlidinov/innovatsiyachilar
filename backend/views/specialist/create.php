<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Category $model */

$this->title = Yii::t('app', 'Create Specialist');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Specialists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialist-create box box-success">
    <div class="box-header">
    </div>
    <div class="box-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
