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
    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}