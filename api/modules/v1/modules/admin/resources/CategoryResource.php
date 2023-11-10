<?php

/*
 *   Jamshidbek Akhlidinov
 *   5 - 10 2023 22:21:41
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\admin\resources;

use common\models\Category;

class CategoryResource extends Category
{
    public function fields()
    {
        return [
            'id',
            'name',
        ];
    }
}