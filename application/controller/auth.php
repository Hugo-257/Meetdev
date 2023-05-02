<?php


class Auth
{

    

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


    public function signup()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/auth/signup.php';
        // require APP . 'view/_templates/footer.php';


    }


    public function admin(){
        $error="";
        $adminPass="";
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