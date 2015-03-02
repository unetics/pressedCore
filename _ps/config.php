<?php
define('TR_PLUGINS', true);
define('TR_FOLDER', '_ps');
/* define('TR_SEED', 'yourCustomSeedHere.'); */

/*
|--------------------------------------------------------------------------
| Debug dont use causes errors!
|--------------------------------------------------------------------------
*/
if(isset($_SERVER['APPLICATION_ENV']) && $_SERVER['APPLICATION_ENV'] == 'development') {
define('TR_DEBUG', true);
}
/*
|--------------------------------------------------------------------------
| Plugins
|--------------------------------------------------------------------------
*/
tr::add_plugin('cleaner');
tr::add_plugin('ie-eq');
tr::add_plugin('post-type-autoload');
tr::add_plugin('save');
tr::add_plugin('short-code-autoload');
tr::add_plugin('theme-options');
tr::add_plugin('widget-autoload');
tr::add_plugin('prebuilt-layouts');