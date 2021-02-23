<?php

namespace app\core;


class Session
{
    public function __construct()
    {
        session_start();
    }

    /**
     * checks if user is logged in
     *
     * @return boolean
     */
    public static function isUserLoggedin()
    {
        if (isset($_SESSION['user_id'])) return true;

        return false;
    }


}