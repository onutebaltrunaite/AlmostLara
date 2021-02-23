<?php

namespace app\controller;

use app\core\Controller;

class PostsController extends \app\core\Controller
{
    public function index()
    {
        return $this->render('posts/posts');
    }
}