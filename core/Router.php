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
     *  ['/about' => 'about',],
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
        $this->request = $request;
    }

    /**
     * Add get route and callback fn to routes array
     *
     * @param string $path
     * @param $callback
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * Executes user function if it is set in routes array
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

//        echo "<pre>";
//        var_dump($this->routes);
//        echo "</pre>";
//        exit;

        // trying to run a route from routes array
        $callback = $this->routes[$method][$path] ?? false;

        // if there is no such route added, we say not exist
        if ($callback === false) :
            echo "Page doesnt exists";
            die();
        endif;

        // if our callback value is string
        // $app->router->get('/about', 'about');
        if (is_string($callback)) :
            return $this->renderView($callback);
        endif;

        // page dose exsist we call user function
        return call_user_func($callback);

    }

    public function renderView(string $view)
    {
        $layout = $this->layoutContent();
        $page = $this->pageContent($view);
//        echo $page;
        // take layout and replace the {{content}} with the $page content
        return str_replace('{{content}}', $page, $layout);

        //
    }

    protected function layoutContent()
    {
        // start buffering
        ob_start();
        include_once Application::$ROOT_DIR . "/view/layout/main.php";
        // stop and return buffering
        return ob_get_clean();

    }

    protected function pageContent($view)
    {
        // start buffering
        ob_start();
        include_once Application::$ROOT_DIR . "/view/$view.php";
        // stop and return buffering
        return ob_get_clean();
    }


}