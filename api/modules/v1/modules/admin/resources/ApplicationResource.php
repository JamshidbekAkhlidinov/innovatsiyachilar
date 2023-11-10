<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 11:37:46
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\admin\resources;

use common\enums\ApplicationStatusEnum;
use common\models\Application;
use yii\helpers\Url;

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
            'application_file' => function (Application $application) {
                return $this->getUrl($application, 'application_file');
            },
            'passport_file' => function (Application $application) {
                return $this->getUrl($application, 'passport_file');
            },
            'diploma_copy_file' => function (Application $application) {
                return $this->getUrl($application, 'diploma_copy_file');
            },
            'diploma_app_file' => function (Application $application) {
                return $this->getUrl($application, 'diploma_app_file');
            },
            'photo_file' => function (Application $application) {
                return $this->getUrl($application, 'photo_file');
            },
            'certificate_file' => function (Application $application) {
                return $this->getUrl($application, 'certificate_file');
            },
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

    public function getUrl(Application $application, $attribute)
    {
        if ($value = $application->{$attribute}) {
            return \Yii::getAlias("@web/application/" . $application->id . "/" . $value);
        }
        return null;
    }
}