<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();


class Preview {
    public function index()
    {
        $favorites =array();
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
        require APP . 'view/preview/index.php';
        require APP . 'view/_templates/footer.php';
    }
}