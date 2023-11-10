<?php
/*
 *   Jamshidbek Akhlidinov
 *   1 - 10 2023 19:39:28
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace backend\assets;

use yii\bootstrap5\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;


class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css'
    ];
    public $js = [
    ];

    public $depends = [
        BootstrapAsset::class,
        YiiAsset::class,
        AdminLteAsset::class,
    ];
}
