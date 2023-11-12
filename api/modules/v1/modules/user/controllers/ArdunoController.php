<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 11 2023 20:27:51
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\controllers;

use api\controllers\BaseController;
use api\modules\v1\modules\user\forms\AddTechnicalHistoryForm;
use common\models\TechnicalList;

class ArdunoController extends BaseController
{
    public function actionAdd()
    {
        return $this->sendResponse(
            new AddTechnicalHistoryForm([
                'technical_id' => TechnicalList::find()
                    ->orderBy(['created_at' => SORT_DESC])
                    ->limit(1)
                    ->one()
                    ->id
            ]),
        );
    }
}