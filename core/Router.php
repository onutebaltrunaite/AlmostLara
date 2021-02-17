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
     * ['get'  => [
     *  ['/' => function return,],
     *  ['/about' => function return,],
     * ],
     * ['post' => [
     *  ['/' => function return,],
     *  ['/about' => function return,],
     * ]]
     * ]
     *
     *
     * ];
     *
     * @var array
     */


    protected array $routes = [];
    public Request $request;


    public function __construct($request)
    {
        // echo 'This is Router constructor <br>';
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        

        // trying to run route from routes array
        $callback = $this->routes[$method][$path] ?? false;

        // if there is no such route added, we say not exists
        if ($callback === false) :
            echo "page doesnt exists";
            die();
        endif;


        // page does exist we call user function


        echo call_user_func($callback);




        // echo "<pre>";
        // print_r($this->routes);
        // echo "</pre>";
        // exit;
    }

    
}