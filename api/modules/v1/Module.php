<?php

namespace api\modules\v1;

use yii\filters\ContentNegotiator;
use yii\web\Response;

/**
 * v1 module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'api\modules\v1\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        user()->enableSession = false;
        user()->loginUrl = null;

        $this->modules = [
            'user' => \api\modules\v1\modules\user\Module::class,
            'admin' => \api\modules\v1\modules\admin\Module::class,
        ];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        return $behaviors;
    }
}
