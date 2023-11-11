<?php
/*
 *   Jamshidbek Akhlidinov
 *   5 - 10 2023 12:35:20
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\filters;

use api\modules\v1\base\FilterRequest;
use api\modules\v1\modules\user\resources\TechnicalResource;

class TechnicalList extends FilterRequest
{
    public $name;

    public function rules()
    {
        return [
            [['name'], 'safe'],
        ];
    }

    public function getModels()
    {
        $query = TechnicalResource::find();

        $query->andWhere(['created_by' => user()->id]);

        $query->orderBy(['created_at' => SORT_DESC]);

        if ($search = $this->name) {
            $query->andWhere(['like', 'name', $search]);
        }
        return $query;
    }


    public function getResult()
    {
        return [
            'success' => true,
            'result' => $this->getModels()->all(),
        ];
    }
}