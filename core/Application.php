<?php


namespace app\core;

/**
 * Class Application
 *
 * This is main application
 *
 * @package app\core
 */
class Application
{
    /**
     * This is instance of Router class
     *
     * We will need routing in all our application. So we will have it as a property;
     *
     * @var Router
     */
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;

    public function __construct($rootPath)
    {
        // static property assignment
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        echo $this->router->resolve();

    }
}
