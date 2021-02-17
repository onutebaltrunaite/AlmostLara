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
     /**
      * Get user page from url
      *
      * [REQUEST_URI] => /todos?id=5
      * extract /todos
      *
      * @return string
      */
    public function getPath() : string
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