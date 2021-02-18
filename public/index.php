<?php
require_once '../vendor/autoload.php';

use app\controller\SiteController;
use app\core\Application;

//echo "<pre>";
//var_dump(dirname(__DIR__));
//echo "</pre>";
//exit;

$app = new Application(dirname(__DIR__));


$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/about', [SiteController::class, 'about']);


$app->router->get('/contact', [SiteController::class, 'contact']);
// we create post path
$app->router->post('/contact', [SiteController::class, 'handleContact']);


$app->run();