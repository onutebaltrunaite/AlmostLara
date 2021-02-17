<?php
// phpinfo();exit;
// require_once 'core/Application.php';
// require_once 'core/Router.php';

require_once 'vendor/autoload.php';

use app\core\Application;
// use app\core\Router;


$app = new Application();




$app->router->get('/', function () {
    return "this is home page";
});

$app->router->get('/about', function () {
    return "this is about page";
});

$app->run();