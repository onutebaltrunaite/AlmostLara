<?php
require_once '../vendor/autoload.php';

use app\controller\PostsController;
use app\controller\SiteController;
use app\core\Application;
use app\core\AuthController;

//echo "<pre>";
//var_dump(dirname(__DIR__));
//echo "</pre>";
//exit;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

// echo "<pre>";
// var_dump($config);
// echo "</pre>";
// exit;


$app = new Application(dirname(__DIR__), $config);


$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/about', [SiteController::class, 'about']);


$app->router->get('/contact', [SiteController::class, 'contact']);


$app->router->get('/fn', function () {
    return 56 + 76;
});

// we create post path
$app->router->post('/contact', [SiteController::class, 'handleContact']);


// routes for login and register
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);


$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/posts', [PostsController::class, 'index']);

// $app->router->get('/post/{id}', [PostsController::class, 'post']);

$app->run();