<?php
require_once '../vendor/autoload.php';

use app\core\Application;

//echo "<pre>";
//var_dump(dirname(__DIR__));
//echo "</pre>";
//exit;

$app = new Application(dirname(__DIR__));


$app->router->get('/', 'home');

$app->router->get('/about', 'about');

$app->run();