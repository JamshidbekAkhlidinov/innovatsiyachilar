<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 12:21:0
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\controllers;

use api\controllers\BaseController;
use api\modules\v1\modules\user\forms\TechnicalForm;
use api\modules\v1\modules\user\requests\TechnicalPageData;
use common\models\TechnicalList;
use yii\web\NotFoundHttpException;

class TechnicalController extends BaseController
{
    public function actionIndex()
    {
        return $this->sendResponse(
            new \api\modules\v1\modules\user\filters\TechnicalList(),
            request()->get(),
        );
    }

    public function actionView($id)
    {
        return $this->sendResponse(
            new TechnicalPageData(
                $this->getModel($id),
            ),
        );
    }


    public function actionCreate()
    {
        return $this->sendResponse(
            new TechnicalForm(
                new TechnicalList(),
                request()->post(),
            )
        );
    }

    public function actionUpdate($id)
    {
        return $this->sendResponse(
            new TechnicalForm(
                $this->getModel($id),
                request()->post(),
            )
        );
    }

    /**
     * @throws NotFoundHttpException
     */
    private function getModel($id)
    {
        $model = TechnicalList::findOne([
            'id' => $id,
            'created_by' => user()->id,
        ]);
        if ($model !== null) {
            return $model;
        }
        throw new NotFoundHttpException(translate("Not Found"));
    }
}