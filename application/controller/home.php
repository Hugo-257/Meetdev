<?php

session_start();

class Home
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views
        if (session_status() !== PHP_SESSION_ACTIVE || !isset($_SESSION["user"])) {
            require APP . 'view/_templates/header_public.php';
        } else {
            $user = Helper::decrypt($_SESSION["user"]);
            $avatarName = strtoupper(substr($user["nom"], 0, 1)) . strtoupper(substr($user["prenom"], 0, 1));
            $favorites = Favorite::getFavoritesUserId($user["id"]);
            require APP . 'view/_templates/header_auth.php';
        }
        $events = Event::getAllEvents();
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';

    }
}