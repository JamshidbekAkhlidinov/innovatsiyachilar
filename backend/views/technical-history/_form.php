<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\TechnicalHistory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="technical-history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'technical_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'calculate_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
