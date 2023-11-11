<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 11 2023 15:10:3
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\forms;

use api\modules\v1\base\FormRequest;
use common\models\Category;
use common\models\TechnicalList;

class TechnicalForm extends FormRequest
{

    public TechnicalList $model;

    public $category_id;

    public $power;
    public $count;
    public $time;

    public function rules()
    {
        return [
            [['category_id', 'count', 'time',], 'integer'],
            [['power'], 'number'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    public function __construct(TechnicalList $model, $config = [])
    {
        $this->model = $model;
        $this->category_id = $model->category_id;
        $this->power = $model->power;
        $this->count = $model->count;
        $this->time = $model->time;
        parent::__construct($config);
    }

    public function getResult()
    {
        $model = $this->model;
        $model->category_id = $this->category_id;
        $model->power = $this->power;
        $model->count = $this->count;
        $model->time = $this->time;
        if ($isSave = $model->save()) {
            return [
                'success' => $isSave,
                'id' => $model->id,
            ];
        }
        return $model;
    }
}
