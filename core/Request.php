<?php


namespace app\core;

/**
 *
 *
 * Class Request
 * @package app\core
 */
class Request
{
    /**
     * Get user page form url
     *
     * [REQUEST_URI] => /todos?id=5
     * extract /todos
     *
     * @return string
     */
    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $questionPosition = strpos($path, '?');

        if ($questionPosition !== false) :
            $path = substr($path, 0, $questionPosition);
        endif;

        return $path;
    }

    /**
     * This will return http method get or post.
     *
     * @return string
     */
    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * helper fn retuns true if server mthd is get
     *
     * @return boolean
     */
    public function isGet(): bool
    {
        return $this->method() === 'get';
    }
    /**
     * helper fn retuns true if server mthd is post
     *
     * @return boolean
     */
    public function isPost(): bool
    {
        return $this->method() === 'post';
    }

    /**
     * Sanitize get and post arrays with html special chars
     *
     * @return array
     */
    public function getBody()
    {
        // store clean values
        $body = [];

        // what type of request
        if ($this->isPost()) :
            foreach ($_POST as $key => $value):
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            endforeach;
        endif;

        if ($this->isGet()) :
            foreach ($_POST as $key => $value):
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            endforeach;
        endif;   

        return $body;

    }



}