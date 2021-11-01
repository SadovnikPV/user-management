<?php

namespace webvimark\modules\UserManagement\assets;

use yii\web\AssetBundle;

/**
 * Login page asset bundle.
 * CSS are taken from https://getbootstrap.com/docs/5.1/examples/sign-in/
 * 
 * @author Daniel Adinugroho <adinugro@gmail.com>
 */
class LoginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/webvimark/module-user-management/assets';

    public $css = [
        'css/login.css',
    ];

    public $js = [];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}