<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 12:21:0
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\admin\controllers;

use api\controllers\BaseController;
use api\modules\v1\modules\admin\filters\SpecialistList;
use api\modules\v1\modules\admin\forms\SpecialistForm;
use api\modules\v1\modules\admin\requests\SpecialistPageData;
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

    public function actionCreate()
    {
        return $this->sendResponse(
            new SpecialistForm(
                new Category(),
                request()->post(),
            )
        );
    }

    public function actionUpdate($id)
    {
        return $this->sendResponse(
            new SpecialistForm(
                $this->getModel($id),
                request()->post(),
            )
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