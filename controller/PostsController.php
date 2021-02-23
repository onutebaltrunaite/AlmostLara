<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;

class PostsController extends Controller
{
    public PostModel $postModel;

    public function __construct()
    {
        $THIS->POSTmODEL = NEW PostModel();

    }
    public function index()
    {
        // get posts 
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts,
        ];
        return $this->render('posts/posts', $data);

       
    }
}



// CREATE TABLE `almost_lara`.`posts` ( `post_id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(150) NOT NULL , `body` TEXT NOT NULL , `created_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `user_id` INT NOT NULL , PRIMARY KEY (`post_id`)) ENGINE = InnoDB;
// ALTER TABLE `posts` ADD CONSTRAINT `postID_to_Users` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;



