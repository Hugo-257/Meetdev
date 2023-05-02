<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);


if (file_exists(ROOT . 'vendor/autoload.php')) {
    require ROOT . 'vendor/autoload.php';
}



// Configuration et fonction utilitaires.
require APP . 'config/config.php';
require APP . 'libs/helper.php';
require APP . 'core/application.php';
require APP . 'core/db.php';


//Les modéles
require APP . 'model/utilisateur.php';
require APP . 'model/event.php';
require APP . 'model/favorite.php';


// Lancer the application
$app = new Application();
