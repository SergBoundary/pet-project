<?php


$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW', __DIR__);
define('ROOT', dirname(__DIR__));
define('CORE', dirname(__DIR__).'/core');

require_once ('../tools/Tools.php');

spl_autoload_register(function($class) {
    $file = ROOT.'/'.str_replace('\\', '/',$class).'.php';
    if(is_file($file)) {
        require_once $file;
    }
});

echo 'URL: '.$query;

$model = new core\Model();