<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 11:49:0
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\admin\controllers;

use api\controllers\BaseController;

class DefaultController extends BaseController
{
    public function actionIndex()
    {
        return "ok";
    }
}