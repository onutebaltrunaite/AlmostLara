<?php


namespace app\controller;


use app\core\Controller;
use app\core\Request;
use app\model\PostModel;
use app\model\UserModel;

class PostsController extends Controller
{
    public PostModel $postModel;
    public UserModel $userModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->userModel = new UserModel();
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


            $id = $urlParam['value'];
            // get post row 
            $post = $this->postModel->getPostById($id);


            if ($post === false) return $this->render('404');



            // lets get user data by user_id
            $user = $this->userModel->getUserById($post->user_id);



    //     echo "<pre>";
    //    print_r($user);
    //    echo "</pre>";
    //    exit;

            $data = [
                // $urlParam['name'] => $urlParam['value'],
                'post' => $post,
                'user' => $user,
            ];

            return $this->render('posts/singlePost', $data);

        endif;
        $request->redirect('/posts');
    }
    
    public function addPost()
    {
        return $this->render('posts/addPost');
    }


    public function editPost(Request $request, $urlParam = null)
    {
        $data = [
            $urlParam['name'] => $urlParam['value'] 
        ];

        return $this->render('posts/editPost', $data);
    }


}


// CREATE TABLE `almost_lara`.`posts` ( `post_id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(150) NOT NULL , `body` TEXT NOT NULL , `created_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `user_id` INT NOT NULL , PRIMARY KEY (`post_id`)) ENGINE = InnoDB;
// ALTER TABLE `posts` ADD CONSTRAINT `postID_to_Users` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;



