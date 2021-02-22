<?php


namespace app\core;

/**
 * responsible for handling register and login
 * 
 * 
 * 
 */
class AuthController extends Controller
{
    public function login()
    {
        // have ability to change layout
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        if ($request->isGet()) :
            // $this->setLayout('auth');

            $data = [
                'name'      => '',
                'email'     => '',
                'password'  => '',
                'confirmPassword' => '',
                'errors' => [
                    'nameErr'      => '',
                    'emailErr'     => '',
                    'passwordErr'  => '',
                    'confirmPasswordErr' => '',
                ],
                'currentPage' => 'register',
            ];



            return $this->render('register', $data);
        endif;

        if ($request->isPost()) :

            // reques s post  and we need to pull data
            $data = $request->getBody();

            // echo "<pre>";
            // var_dump($data);
            // echo "</pre>";
            // exit;

            return $this->render('register', $data);
        endif;
      
    }
}