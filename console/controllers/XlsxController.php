<?php
/*
 *   Jamshidbek Akhlidinov
 *   26 - 9 2023 16:29:3
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace console\controllers;

use common\enums\StatusEnum;
use common\models\TechnicalList;
use common\models\TimeHistory;
use Shuchkin\SimpleXLSX;
use yii\console\Controller;

class XlsxController extends Controller
{
    public function actionJsonTo()
    {
        $baseurl = \Yii::getAlias("@console/web/docs/");
        $name = "111.csv";
//        if ($xlsx = SimpleXLSX::parse($baseurl . $name)) {
//            print_r($xlsx->rows());
//        } else {
//            echo SimpleXLSX::parseError();
//        }
        $file = file_get_contents($baseurl . $name);
        print_r($counts = explode("\n", $file));
        $true = 0;
        foreach ($counts as $count) {
            if ($count == 1) {
                $true++;
                $timeHistory = new TimeHistory([
                    'status' => StatusEnum::ACTIVE,
                    'created_at' => date('Y-m-d'),
                    'technical_id' => TechnicalList::find()
                        ->orderBy(['created_at' => SORT_DESC])
                        ->limit(1)
                        ->one()->id,
                ]);
                echo $timeHistory->save();
            }
        }
        print_r($true);
    }

}