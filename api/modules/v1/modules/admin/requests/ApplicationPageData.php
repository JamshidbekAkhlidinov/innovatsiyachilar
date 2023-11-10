<?php
/*
 *   Jamshidbek Akhlidinov
 *   5 - 10 2023 12:32:58
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\admin\requests;

use api\modules\v1\base\BaseRequest;
use common\models\Application;

class ApplicationPageData extends BaseRequest
{

    public Application $application;

    public function __construct(Application $application, $config = [])
    {
        $this->application = $application;
        parent::__construct($config);
    }

    public function getResult()
    {
        return $this->application;
    }
}