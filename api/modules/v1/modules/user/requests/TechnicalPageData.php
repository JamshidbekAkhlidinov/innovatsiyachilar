<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 11 2023 15:9:27
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\requests;

use api\modules\v1\base\BaseRequest;
use api\modules\v1\modules\user\resources\TechnicalResource;
use common\models\TechnicalList;

class TechnicalPageData extends BaseRequest
{

    public TechnicalList $category;

    public function __construct(TechnicalList $category, $config = [])
    {
        $this->category = TechnicalResource::findOne(['id' => $category->id]);
        parent::__construct($config);
    }

    public function getResult()
    {
        return $this->category;
    }
}