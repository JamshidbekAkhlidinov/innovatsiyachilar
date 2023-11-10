<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 11:37:46
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\resources;

use common\enums\ApplicationStatusEnum;
use common\models\Application;

class ApplicationResource extends Application
{
    public function fields()
    {
        return [
            'id',
            'specialist',
            'firs_name',
            'last_name',
            'patronymic',
            'passport_number',
            'application_file',
            'passport_file',
            'diploma_copy_file',
            'diploma_app_file',
            'photo_file',
            'certificate_file',
            'status' => static function ($model) {
                return ApplicationStatusEnum::LABELS[$model->status] ?? '';
            },
            'exam_result',
            'created_at',
            'user_id',
        ];
    }

    /**
     * Gets query for [[Specialist]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SpecialistQuery
     */
    public function getSpecialist()
    {
        return $this->hasOne(CategoryResource::class, ['id' => 'specialist_id']);
    }
}