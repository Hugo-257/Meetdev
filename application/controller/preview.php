<?php

class Preview {
    public function index()
    {
        // load views
            require APP . 'view/_templates/header_public.php';
        // if (session_status() !== PHP_SESSION_ACTIVE) {
        //     header('Location: ' . URL . 'auth/login');
        // } else {
            require APP . 'view/preview/index.php';
            require APP . 'view/_templates/footer.php';

        // }
    }
}