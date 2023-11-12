<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 11 2023 10:36:23
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\forms;

use api\modules\v1\base\FormRequest;
use common\models\TechnicalHistory;

class AddTechnicalHistoryForm extends FormRequest
{
    public $technical_id;

    public function rules()
    {
        return [
            ['technical_id', 'integer'],
        ];
    }

    public function getResult()
    {
        $history = TechnicalHistory::findOne([
            'technical_id' => $this->technical_id,
            'date' => date('Y-m-d'),
        ]);
        if ($history) {
            $history->calculate_time += 1;
        }
    }
}