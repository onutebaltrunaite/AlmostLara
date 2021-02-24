<?php


namespace app\controller;


use app\core\Controller;
use app\core\Request;
use app\model\PostModel;

class PostsController extends Controller
{
    public PostModel $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index(Request $request)
    {
        // get posts
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts,
        ];
        return $this->render('posts/posts', $data);
    }

    public function post(Request $request, $urlParam = null)
    {

        if ($urlParam['value']) :

            $data = [
                $urlParam['name'] => $urlParam['value'],

            ];
            return $this->render('posts/singlePost', $data);

        endif;
        $request->redirect('/posts');
    }

}


// CREATE TABLE `almost_lara`.`posts` ( `post_id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(150) NOT NULL , `body` TEXT NOT NULL , `created_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `user_id` INT NOT NULL , PRIMARY KEY (`post_id`)) ENGINE = InnoDB;
// ALTER TABLE `posts` ADD CONSTRAINT `postID_to_Users` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;



