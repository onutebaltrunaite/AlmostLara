<?php

namespace app\core;
/**
 * Class Router
 * 
 * This is where we call controllers and methods
 * 
 * @package app\core
 */

class Router
{
    /**
     * This will hold all routes.
     * 
     * routes [
     * ['get' => [
    * ['/' => function return,],
    * ['/about' => function return,],
     * ]]
     * ['/' => function return,],
     * ['/about' => function return,],
     * 
     * ];
     * 
     * @var array
     */


    protected array $routes = [];
    public function __construct()
    {
        echo 'This is Router constructor <br>';
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    
    public function resolve()
    {
        echo "<pre>";
        var_dump($this->routes);
        echo "</pre>";
        exit;
    }

    
}