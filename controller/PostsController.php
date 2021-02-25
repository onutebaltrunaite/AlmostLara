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
    
    public function addPost(Request $request)
    {
        if ($request->isGet()) :
            //            $this->setLayout('auth');
            
                        // create data
                        $data = [
                            'title' => '',
                            'body' => '',
                            'errors' => [
                                'titleErr' => '',
                                'bodyErr' => '',
                                ]
                        ];
            
                return $this->render('posts/addPost', $data);  
        endif;

        if ($request->isPost()) :
            $data = $request->getBody();
            //validate title
            if (empty($data['title'])) {
                $data['titleErr'] = "Please enter a title";
            }
            // validate body
            if (empty($data['body'])) {
                $data['bodyErr'] = "Please enter a body";
            }
            // if no errrors
            if (empty($data['titleErr']) && empty($data['bodyErr'])) {
                if ($this->postModel->addPost($data)){
                    $request->redirect('/posts');
                } else {
                    die('something went wrong');
                }
            } else {
                return $this->render('posts/addPost', $data); 
            }

        endif;
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



