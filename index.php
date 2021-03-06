<?php
session_start();
ob_start();
error_reporting(-1);


define('DEBUG', true);
setlocale(LC_ALL, 'nl_NL.utf-8', 'nl.utf-8', 'nl_NL', 'nl', 'dutch', 'nld');

define('ROOT_DIR', realpath(dirname(__FILE__)) . '/');
define('CACHE_DIR', ROOT_DIR . 'cache/');

define('CONTENT_DIR', ROOT_DIR . 'content/');
define('CONTENT_EXT', '.md');

define('PLUGINS_DIR', ROOT_DIR . 'plugins/');
define('MODULES_DIR', ROOT_DIR . 'modules/');
define('THEMES_DIR', ROOT_DIR . 'themes/');

define('PICO_DIR', MODULES_DIR . 'pico/');

require PICO_DIR . 'vendor/autoload.php';
require PICO_DIR . 'lib/pico.php';

// Markdown :)
spl_autoload_register(function($class) {
	require MODULES_DIR . 'markdown/' . preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';

});
function Markdown($text) {
	return \Michelf\MarkdownExtra::defaultTransform($text);
}

new Pico();
