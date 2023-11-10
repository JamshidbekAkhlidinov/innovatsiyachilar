<?php
/*
 *   Jamshidbek Akhlidinov
 *   8 - 10 2023 19:8:0
 *   https://github.com/JamshidbekAkhlidinov
 */
namespace api\modules\v1\modules\admin\forms;

use api\modules\v1\base\BaseRequest;
use common\enums\ApplicationStatusEnum;
use common\models\Application;

class ApplicationSuccessForm extends BaseRequest
{

    public Application $application;

    public function __construct(Application $application, $config = [])
    {
        $this->application = $application;
        parent::__construct($config);
    }

    public function getResult()
    {
        $application = $this->application;
        $application->status = ApplicationStatusEnum::SUCCESS;

        return $application->save();
    }
}