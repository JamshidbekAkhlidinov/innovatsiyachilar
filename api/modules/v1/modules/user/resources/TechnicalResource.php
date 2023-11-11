<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 11 2023 15:8:37
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\resources;

use common\models\TechnicalList;

class TechnicalResource extends TechnicalList
{
    public function fields()
    {
        return [
            'id',
            'category_id',
            'power',
            'count',
            'time',
            'created_at',
        ];
    }
}