<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 12:22:54
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\requests;

use api\modules\v1\base\BaseRequest;
use common\models\Category;

class CategoryPageData extends BaseRequest
{

    public Category $category;

    public function __construct(Category $category, $config = [])
    {
        $this->category = $category;
        parent::__construct($config);
    }

    public function getResult()
    {
        return $this->category;
    }
}