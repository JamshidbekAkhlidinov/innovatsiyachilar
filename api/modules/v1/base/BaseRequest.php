<?php

namespace api\modules\v1\base;

use yii\base\Model;

abstract class BaseRequest extends Model
{
    abstract public function getResult();
}