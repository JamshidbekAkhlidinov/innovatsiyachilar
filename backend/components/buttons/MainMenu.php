<?php
/*
 *   Jamshidbek Akhlidinov
 *   1 - 10 2023 21:57:14
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace backend\components\buttons;

use backend\widgets\MenuWidget;
use common\enums\UserRolesEnum;
use Yii;

class MainMenu
{
    public static function getMenu()
    {
        $controller_id = app()->controller->id;
        $module_id = app()->controller->module->id;
        return MenuWidget::widget([
            'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
            'items' => [
                [
                    'label' => 'Menu Yii2',
                    'header' => true,
                    'options' => [
                        'class' => 'header'
                    ]
                ],
                [
                    'label' => translate("Users"),
                    'iconType' => 'fa',
                    'icon' => 'users',
                    'url' => ['/user'],
                    'options' => [
                        'class' => $controller_id == 'user' ? 'active' : ''
                    ]
                ],
                [
                    'label' => translate("Categories"),
                    'iconType' => 'fa',
                    'icon' => 'th-large ',
                    'url' => ['/category'],
                    'options' => [
                        'class' => $controller_id == 'specialist' ? 'active' : ''
                    ]
                ],
                [
                    'label' => translate("Application"),
                    'iconType' => 'fa',
                    'icon' => 'mail-forward ',
                    'url' => ['/application'],
                    'options' => [
                        'class' => $controller_id == 'application' ? 'active' : ''
                    ]
                ],

                [
                    'label' => translate("Rbac configuration"),
                    'iconType' => 'far',
                    'icon' => 'user',
                    'url' => ['#'],
                    'visible' => user()->can(UserRolesEnum::ROLE_ADMINISTRATOR),
                    'options' => [
                        'class' => $module_id == 'rbac' ? 'active' : '',
                    ],
                    'items' => [
                        [
                            'label' => translate("Rules"),
                            'iconType' => 'far',
                            'icon' => 'file-code',
                            'url' => ['/rbac/auth-rule'],
                            'options' => [
                                'class' => $controller_id == 'auth-rule' ? 'active' : ''
                            ]
                        ],
                        [
                            'label' => translate("Items"),
                            'iconType' => 'far',
                            'icon' => 'file-code',
                            'url' => ['/rbac/auth-item'],
                            'options' => [
                                'class' => $controller_id == 'auth-item' ? 'active' : ''
                            ]
                        ],
                        [
                            'label' => translate("Assignment"),
                            'iconType' => 'far',
                            'icon' => 'file-code',
                            'url' => ['/rbac/auth-assignment'],
                            'options' => [
                                'class' => $controller_id == 'auth-assignment' ? 'active' : ''
                            ]
                        ],
                    ]
                ],
            ],
        ]);
    }

    public static function getDefaultMenu()
    {
        return MenuWidget::widget([
            'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
            'items' => [
                ['label' => 'Menu Yii2', 'header' => true, 'options' => ['class' => 'header']],
                ['label' => 'Gii', 'iconType' => 'far', 'icon' => 'file-code', 'url' => ['/gii'], 'options' => ['class' => '']],
                ['label' => 'Debug', 'icon' => 'tachometer-alt', 'url' => ['/debug']],
                ['label' => 'Login', 'url' => ['site/login'], 'visible' => user()->isGuest],
                [
                    'label' => 'Some tools',
                    'icon' => 'share',
                    'url' => '#',
                    'items' => [
                        ['label' => 'Gii', 'iconType' => 'far', 'icon' => 'file-code', 'url' => ['/gii'],],
                        ['label' => 'Debug', 'icon' => 'tachometer-alt', 'url' => ['/debug'],],
                        [
                            'label' => 'Level One',
                            'iconType' => 'far',
                            'icon' => 'circle',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Level Two', 'iconType' => 'far', 'icon' => 'dot-circle', 'url' => '#',],
                                [
                                    'label' => 'Level Two',
                                    'iconType' => 'far',
                                    'icon' => 'dot-circle',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Level Three', 'icon' => 'dot-circle', 'url' => '#',],
                                        ['label' => 'Level Three', 'icon' => 'dot-circle', 'url' => '#',],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}