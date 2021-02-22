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
            $this->setLayout('auth');
            return $this->render('register');
        endif;

        if ($request->isPost()) :
            return "Validating form";
        endif;
      
    }
}