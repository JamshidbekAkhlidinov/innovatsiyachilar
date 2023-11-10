<?php
/*
 *   Jamshidbek Akhlidinov
 *   2 - 10 2023 17:59:25
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace api\modules\v1\modules\user\resources;

use common\models\User;

class UserResource extends User
{
    public function fields()
    {
        return [
            'id',
            //'username',
            'email',
            //'auth_key',
            //'status',
            //'first_name',
            //'last_name',
            //'patronymic',
            'full_name',
            'created_at',
        ];
    }
}