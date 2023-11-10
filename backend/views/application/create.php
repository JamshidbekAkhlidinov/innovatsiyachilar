<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Application $model */

$this->title = Yii::t('app', 'Create Application');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Applications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-create box box-success">
    <div class="box-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
