<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Auth
{

    /**
     * PAGE: login
     * This method handles what happens when you move to /auth/login
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */

    public function index()
    {
        // load views
        $error="";
        require APP . 'view/_templates/header.php';
        require APP . 'view/auth/login.php';
    }

    public function login()
    {   
        $error="";
        if (session_status() == PHP_SESSION_ACTIVE)
            session_destroy();
        if (isset($_POST["login"])) {
            $user = Utilisateur::getUtilisateur($_POST["email"], $_POST["password"]);
            if (isset($user) && !is_bool($user)) {
                session_start();
                $_SESSION["user"] = Helper::encrypt($user);
                header('location: ' . URL . 'myspace');
            }else{
                $error="Invalid email or password!";
                require APP . 'view/_templates/header.php';
                require APP . 'view/auth/login.php';
            }
        }
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
        // require APP . 'view/_templates/footer.php';


    }


    public function admin(){
        $error="";
        require APP . 'view/_templates/header.php';
        require APP . 'view/auth/admin.php';
    }

    public function register()
    {

        if (isset($_POST["register"])) {
            // do updateSong() from model/model.php
            $utilisateur = new Utilisateur($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST['password']);
            $utilisateur->addUtilisateur();

            $user = array('nom' => $_POST["nom"], 'prenom' => $_POST["prenom"], 'email' => $_POST["email"],"role" => "user");

            session_start();
            $_SESSION["user"] = Helper::encrypt($user);

            header('location: ' . URL . 'myspace');
        }
    }

    public function disconnect()
    {
        session_start();
        session_destroy();
        header("location:" . URL . "auth");
    }


}