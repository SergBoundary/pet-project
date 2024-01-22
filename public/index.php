<?php
session_start();

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define("DEBUG", 1);

require_once 'autoload.php';
require_once ROOT . '/vendor/autoload.php';
require_once(TOOLS . '/Tools.php');

use App\Core\App;
use App\UserExperience\Navigation\Router;

new App;

new Router();

Router::dispatch($query);

//use App\UserInterface\Pages\EditImage;
//
//echo EditImage::getEditImage('avatar');


//use App\UserInterface\Pages\EditText;
//
//echo EditText::getEditMessage();
