<?php
/*
Plugin Name: Include Combindator
Plugin URI: http://www.reesskennedy.com
Description: Combines all files in "includes" into one file, inspired by adminder (adminer.org)
Author: Reess Kennedy
Author URI: http://www.reesskennedy.com
*/

//========== ### CONSTANTS ### ==========
$file = dirname(__FILE__) . '/include-combinator.php';
define( 'SURGO_COMBINATOR_DIR', plugin_dir_path($file));

echo 'above';

require(SURGO_COMBINATOR_DIR.'/version-includes.php');

echo 'below';

die();
