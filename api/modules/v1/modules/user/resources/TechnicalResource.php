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
            'your' => static function (TechnicalList $model) {
                $power = $model->power / 1000;
                $sum = 295; // uzb da 1 kv energiya
                $count = $model->count;
                $one_day = $model->time * $power * $count * $sum;
                $one_week = 7 * $model->time * $power * $count * $sum;
                $one_month = 30 * $model->time * $power * $count * $sum;
                $one_year = 12 * 30 * $model->time * $power * $count * $sum;
                $ten_year = 10 * 12 * 30 * $model->time * $power * $count * $sum;
                return [
                    "message" => "Foydalanuvchi kiritgan vaqt bo'yicha, , `sum` da",
                    'one_day' => $one_day,
                    'one_week' => $one_week,
                    'one_month' => $one_month,
                    'one_year' => $one_year,
                    'ten_year' => $ten_year,
                ];
            },
            'we_calculate' => static function (TechnicalList $model) {
                $time = $model->time - 10; //10 soat tejash uchun
                $power = $model->power / 1000;
                $sum = 295; // uzb da 1 kv energiya
                $count = $model->count;
                $one_day = $time * $power * $count * $sum;
                $one_week = 7 * $time * $power * $count * $sum;
                $one_month = 30 * $time * $power * $count * $sum;
                $one_year = 12 * 30 * $time * $power * $count * $sum;
                $ten_year = 10 * 12 * 30 * $time * $power * $count * $sum;
                return [
                    "message" => "Bir kunda 2 soat kamproq vaqt foydalanilsa, `sum` da",
                    'one_day' => $one_day,
                    'one_week' => $one_week,
                    'one_month' => $one_month,
                    'one_year' => $one_year,
                    'ten_year' => $ten_year,
                ];
            }
        ];
    }
}
