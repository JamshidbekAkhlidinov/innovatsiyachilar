<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 12:21:0
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\controllers;

use api\controllers\BaseController;
use api\modules\v1\modules\user\filters\SpecialistList;
use api\modules\v1\modules\user\requests\SpecialistPageData;
use common\models\Category;
use yii\web\NotFoundHttpException;

class SpecialistController extends BaseController
{
    public function actionIndex()
    {
        return $this->sendResponse(
            new SpecialistList(),
            request()->get(),
        );
    }

    public function actionView($id)
    {
        return $this->sendResponse(
            new SpecialistPageData(
                $this->getModel($id),
            ),
        );
    }

    /**
     * @throws NotFoundHttpException
     */
    private function getModel($id)
    {
        $model = Category::findOne([
            'id' => $id,
        ]);
        if ($model !== null) {
            return $model;
        }
        throw new NotFoundHttpException(translate("Not Found"));
    }
}