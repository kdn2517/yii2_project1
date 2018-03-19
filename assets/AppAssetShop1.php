<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class AppAssetShop1 extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'shop1/css/style.css',
        'shop1/css/slippry.css',
        'shop1/css/owl.carousel.css',
        'shop1/css/megamenu.css',
        'shop1/css/jstarbox.css',
        'shop1/css/jquery-ui.css',
        'shop1/css/etalage.css',
    ];
    
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    
    public $js = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800',
        'shop1/js/jquery.min.js',
        'shop1/js/jquery.easy-ticker.js',
        'shop1/js/megamenu.js',
        'shop1/js/menu_jquery.js',
        'shop1/js/jquery-ui.js',
        'shop1/js/scripts-f0e4e0c2.js',
        'shop1/js/move-top.js',
        'shop1/js/easing.js',
        'shop1/js/easyResponsiveTabs.js',
        'shop1/js/jstarbox.js',
        'shop1/js/modal.js',
        'shop1/js/owl.carousel.js',
	'shop1/js/jquery.etalage.min.js',
	'shop1/js/cart.js',
    ];
    
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',];
}

