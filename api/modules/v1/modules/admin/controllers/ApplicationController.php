<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 11:37:46
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\admin\controllers;

use api\controllers\BaseController;
use api\modules\v1\modules\admin\filters\ApplicationList;
use api\modules\v1\modules\admin\forms\ApplicationCancelForm;
use api\modules\v1\modules\admin\forms\ApplicationDoneForm;
use api\modules\v1\modules\admin\forms\ApplicationExamForm;
use api\modules\v1\modules\admin\forms\ApplicationSuccessForm;
use api\modules\v1\modules\admin\forms\ApplicationWaitingForm;
use api\modules\v1\modules\admin\requests\ApplicationPageData;
use api\modules\v1\modules\admin\resources\ApplicationResource;
use yii\web\NotFoundHttpException;

class ApplicationController extends BaseController
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
        'linksEnvelope' => 'links',
        'metaEnvelope' => 'options',
    ];

    public function actionIndex()
    {
        return $this->sendResponse(
            new ApplicationList(),
            request()->get(),
        );
    }

    public function actionView($id)
    {
        return $this->sendResponse(
            new ApplicationPageData(
                $this->getModel($id),
            ),
        );
    }

    public function actionSuccessApplication($id)
    {
        return $this->sendResponse(
            new ApplicationSuccessForm(
                $this->getModel($id),
            ),
        );
    }

    public function actionCancelApplication($id)
    {
        return $this->sendResponse(
            new ApplicationCancelForm(
                $this->getModel($id),
            ),
        );
    }

    public function actionDoneApplication($id)
    {
        return $this->sendResponse(
            new ApplicationDoneForm(
                $this->getModel($id),
            ),
        );
    }

    public function actionWaitingApplication($id)
    {
        return $this->sendResponse(
            new ApplicationWaitingForm(
                $this->getModel($id),
            ),
        );
    }

    public function actionExamApplication($id)
    {
        return $this->sendResponse(
            new ApplicationExamForm(
                $this->getModel($id),
            ),
        );
    }

    /**
     * @throws NotFoundHttpException
     */
    private function getModel($id)
    {
        $model = ApplicationResource::findOne([
            'id' => $id,
        ]);
        if ($model !== null) {
            return $model;
        }
        throw new NotFoundHttpException(translate("Not Found"));
    }
}