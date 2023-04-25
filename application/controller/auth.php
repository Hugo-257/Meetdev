<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Auth extends Controller
{
    
    /**
     * PAGE: login
     * This method handles what happens when you move to /auth/login
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */

    public function index(){
        $this->login();
    }

    public function login()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/auth/login.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: exampletwo
     * This method handles what happens when you move to /auth/signup
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function signup()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/auth/signup.php';
        require APP . 'view/_templates/footer.php';
    }
}
