<?php
session_start();

class Admin
{
    public function index()
    {

        $adminPass = ADMINPASS;
        // load views
        if (session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION["admin"])) {
            header('Location: ' . URL . 'auth/admin');
        } else {
            $avatarName = "A";
            $events = Event::getAllEvents();
            require APP . 'view/_templates/header_auth.php';
            require APP . 'view/admin/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function authenticate()
    {
        if (isset($_POST["password"])) {
            if ($_POST["password"] == ADMINPASS) {
                $user = array("role" => "admin");
                session_start();
                $_SESSION["admin"] = Helper::encrypt($user);
                header('location: ' . URL . 'admin');

            } else {
                $error = "Admin password is invalid!";
                require APP . 'view/_templates/header.php';
                require APP . 'view/auth/admin.php';
            }
        } else {
            $error = "";
            $adminPass = ADMINPASS;
            require APP . 'view/_templates/header.php';
            require APP . 'view/auth/admin.php';
        }
    }


    public function post()
    {
        if (session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION["admin"])) {
            $adminPass="";
            header('Location: ' . URL . 'auth/admin');
        } else {
            $user = Helper::decrypt($_SESSION["admin"]);
            $avatarName = 'A';
            require APP . 'view/_templates/header_auth.php';
            require APP . 'view/admin/post.php';
            require APP . 'view/_templates/footer.php';
        }
    }


}