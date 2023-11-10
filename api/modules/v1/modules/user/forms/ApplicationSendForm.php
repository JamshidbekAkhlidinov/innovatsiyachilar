<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 10 2023 11:37:46
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\forms;

use api\modules\v1\base\BaseRequest;
use common\enums\ApplicationStatusEnum;
use common\models\Application;

class ApplicationSendForm extends BaseRequest
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
        $application->status = ApplicationStatusEnum::SEND;

        return $application->save();
    }
}