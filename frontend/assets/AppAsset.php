<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
       'style/css/bootstrap.min.css',
       'style/css/plugins.css',
       'style/revolution/css/settings.css',
       'style/revolution/css/layers.css',
       'style/revolution/css/navigation.css',
       'style.css',
       'style/css/color/blue.css',
       'style/type/icons.css',
    ];
    public $js = [
        'style/js/jquery.min.js',
        'style/js/bootstrap.min.js',
        'style/revolution/js/jquery.themepunch.tools.min.js?rev=5.0',
        'style/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0',
        'style/revolution/js/extensions/revolution.extension.slideanims.min.js',
        'style/revolution/js/extensions/revolution.extension.layeranimation.min.js',
        'style/revolution/js/extensions/revolution.extension.navigation.min.js',
        'style/revolution/js/extensions/revolution.extension.carousel.min.js',
        'style/revolution/js/extensions/revolution.extension.video.min.js',
        'style/js/plugins.js',
        'style/js/scripts.js',
        'https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js',
    ];

}
