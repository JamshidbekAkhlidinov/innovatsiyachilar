<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 12:22:54
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\admin\requests;

use api\modules\v1\base\BaseRequest;
use common\models\Category;

class SpecialistPageData extends BaseRequest
{

    public Category $application;

    public function __construct(Category $application, $config = [])
    {
        $this->application = $application;
        parent::__construct($config);
    }

    public function getResult()
    {
        return $this->application;
    }
}