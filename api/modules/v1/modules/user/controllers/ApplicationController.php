<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 11:37:46
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\controllers;

use api\controllers\BaseController;
use api\modules\v1\modules\user\filters\ApplicationList;
use api\modules\v1\modules\user\forms\ApplicationForm;
use api\modules\v1\modules\user\forms\ApplicationSendForm;
use api\modules\v1\modules\user\requests\ApplicationPageData;
use api\modules\v1\modules\user\resources\ApplicationResource;
use yii\web\NotFoundHttpException;

class ApplicationController extends BaseController
{
    public function actionCreate()
    {
        return $this->sendResponse(
            new ApplicationForm(
                new ApplicationResource()
            ),
            request()->post(),
        );
    }

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

    public function actionSendApplication($id)
    {
        return $this->sendResponse(
            new ApplicationSendForm(
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
            'user_id' => user()->id,
        ]);
        if ($model !== null) {
            return $model;
        }
        throw new NotFoundHttpException(translate("Not Found"));
    }
}