<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 11 2023 10:36:23
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\forms;

use api\modules\v1\base\FormRequest;
use common\enums\StatusEnum;
use common\models\TechnicalHistory;
use common\models\TimeHistory;

class AddTechnicalHistoryForm extends FormRequest
{
    public $technical_id;

    public function rules()
    {
        return [
            [['technical_id'], 'integer'],
        ];
    }

    public function getResult()
    {
        $baseurl = \Yii::getAlias("@api/web/docs/");
        $name = "111.csv";
        $file = file_get_contents($baseurl . $name);
        $counts = explode("\n", $file);
        $timeHistoriesCount = 0;
        foreach ($counts as $count) {
            if ($count == 1) {
                $timeHistoriesCount++;
            }
        }

        $history = TechnicalHistory::findOne([
            'technical_id' => $this->technical_id,
            'date' => date('Y-m-d'),
        ]);
        if (!$history) {
            $history = new TechnicalHistory([
                'technical_id' => $this->technical_id,
                'date' => date('Y-m-d'),
            ]);
        }
        $history->calculate_time += $timeHistoriesCount;
        if ($isSave = $history->save()) {
            return $isSave;
        }
        return $history;
    }
}