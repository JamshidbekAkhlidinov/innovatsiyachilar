<?php

use common\models\Application;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\search\ApplicationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Applications');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index box box-success">

    <div class="box-header">
        <?= Html::a(Yii::t('app', 'Create Application'), ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'header' => translate("Full name"),
                    'format' => 'raw',
                    'attribute' => 'fullName',
                    'value' => function (Application $data) {
                        return Html::a(
                            $data->last_name . " " . $data->firs_name . " " . $data->patronymic,
                            [
                                'user/view', 'id' => $data->user_id
                            ]
                        );
                    },
                ],
                //'id',
                //'specialist_id',
                //'firs_name',
                //'last_name',
                //'patronymic',
                'passport_number',
                //'application_file',
                //'passport_file',
                //'diploma_copy_file',
                //'diploma_app_file',
                //'photo_file',
                //'certificate_file',
                'status',
                'exam_result',
                'created_at',
                //'updated_at',
                //'user_id',
                //'updated_by',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Application $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>

</div>
