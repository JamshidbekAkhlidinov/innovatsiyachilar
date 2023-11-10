<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Application $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'specialist_id')->textInput() ?>

    <?= $form->field($model, 'firs_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'application_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diploma_copy_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diploma_app_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'certificate_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'exam_result')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
