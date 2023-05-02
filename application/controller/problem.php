<?php

class Problem 
{
    /**
     * PAGE: index
     * C'est la page affichée si il'y a un probléme sur le site par défaut.
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/problem/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
