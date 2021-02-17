<?php

namespace app\core;
/**
 * 
 * Get user page form url
 * 
 * [REQUEST_URL] =>/AlmostLara/todos?id=5
 * extract /todos
 * 
 * Class Request
 * 
 * @package app\core
 */

 class Request
 {
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/AlmostLara/';

        $questionPosition = strpos($path, '?');

        if ($questionPosition !== false) :
            $path = substr($path, 0, $questionPosition);
        endif;

        return $path;


        // echo "<pre>";
        // var_dump($questionPosition);
        // echo "</pre>";
        // exit;
    }
 }