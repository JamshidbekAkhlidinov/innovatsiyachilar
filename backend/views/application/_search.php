<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\search\ApplicationSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'specialist_id') ?>

    <?= $form->field($model, 'firs_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'patronymic') ?>

    <?php // echo $form->field($model, 'passport_number') ?>

    <?php // echo $form->field($model, 'application_file') ?>

    <?php // echo $form->field($model, 'passport_file') ?>

    <?php // echo $form->field($model, 'diploma_copy_file') ?>

    <?php // echo $form->field($model, 'diploma_app_file') ?>

    <?php // echo $form->field($model, 'photo_file') ?>

    <?php // echo $form->field($model, 'certificate_file') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'exam_result') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
