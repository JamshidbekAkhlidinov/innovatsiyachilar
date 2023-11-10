<?php
/*
 *   Jamshidbek Akhlidinov
 *   8 - 10 2023 18:47:42
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\admin\forms;

use api\modules\v1\base\FormRequest;
use common\models\Category;

class SpecialistForm extends FormRequest
{

    public Category $model;

    public $name;

    public $status;

    public function rules()
    {
        return [
            [['status', 'name'], 'required'],
        ];
    }

    public function __construct(Category $model, $config = [])
    {
        $this->model = $model;
        $this->name = $model->name;
        $this->status = $model->status;
        parent::__construct($config);
    }

    public function getResult()
    {
        $model = $this->model;
        $model->status = $this->status;
        $model->name = $this->name;
        return $model->save();
    }
}
