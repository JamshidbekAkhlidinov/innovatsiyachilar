<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 11 2023 20:27:51
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\controllers;

use api\controllers\BaseController;
use api\modules\v1\modules\user\forms\AddTechnicalHistoryForm;

class ArdunoController extends BaseController
{
    public function actionAdd($technical_id)
    {
        return $this->sendResponse(
            new AddTechnicalHistoryForm($technical_id),
        );
    }
}