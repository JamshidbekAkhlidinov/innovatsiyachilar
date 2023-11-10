<?php
/*
 *   Jamshidbek Akhlidinov
 *   5 - 10 2023 12:35:20
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\admin\filters;

use api\modules\v1\base\FilterRequest;
use api\modules\v1\modules\admin\resources\ApplicationResource;
use yii\data\ActiveDataProvider;

class ApplicationList extends FilterRequest
{
    public $fullName;
    public $specialist_id;
    public $passport_number;
    public $status;
    public $created_at;
    public $user_id;

    public function rules()
    {
        return [
            [['fullName', 'specialist_id', 'passport_number', 'status', 'created_at', 'user_id'], 'safe'],
        ];
    }

    public function getModels()
    {
        $query = ApplicationResource::find();

        $query->orderBy(['created_at' => SORT_DESC]);

        if ($search = $this->specialist_id) {
            $query->andWhere(['specialist_id' => $search]);
        }
        if ($search = $this->passport_number) {
            $query->andWhere(['passport_number' => $search]);
        }
        if ($search = $this->created_at) {
            $query->andWhere(['created_at' => $search]);
        }
        if ($search = $this->status) {
            $query->andWhere(['status' => $search]);
        }
        return $query;
    }


    public function getResult()
    {
        return [
            'success' => true,
            'result' => new ActiveDataProvider([
                'query' => $this->getModels()
            ]),
        ];
    }
}