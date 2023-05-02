<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();


class Myspace
{
    public function index()
    {
        // load views

        if (session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION["user"])) {
            header('Location: ' . URL . 'auth');
        } else {
            $user = Helper::decrypt($_SESSION["user"]);
            $avatarName = strtoupper(substr($user["nom"], 0, 1)) . strtoupper(substr($user["prenom"], 0, 1));
            $events = Favorite::getFavoritesUser($user["id"]);
            require APP . 'view/_templates/header_auth.php';
            require APP . 'view/myspace/index.php';
            require APP . 'view/_templates/footer.php';

        }
    }



    public function save()
    {
        if (isset($_GET["id"])) {
            if (session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION["user"])) {
                header('Location: ' . URL . 'auth');
            } else {
                $user = Helper::decrypt($_SESSION["user"]);
                
                $favorite=new Favorite($user["id"],$_GET["id"]);
                $res=$favorite->addFavoritesUser();
                if($res){
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function remove()
    {
        if (isset($_GET["id"])) {
            if (session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION["user"])) {
                header('Location: ' . URL . 'auth');
            } else {
                $user = Helper::decrypt($_SESSION["user"]);
                $res=Favorite::removeFavoritesUser($user["id"],$_GET["id"]);
                if($res){
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

}