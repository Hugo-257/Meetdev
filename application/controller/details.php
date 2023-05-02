<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

class Details
{

    function filterEvents($event)
    {
        return $event->id !== $_GET["id"];
    }

    public function index()
    {
        if (isset($_GET["id"])) {
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
            $events = array_filter($events, function ($event) {
                return $event->id != $_GET["id"];
            });
            $event = Event::getEventById($_GET["id"]);
            if (isset($event)) {
                $data = array(
                    "timeIndication" => (Helper::getMonthFromDate($event->date) . " " . explode("-", $event->date)[2] . " " .
                        explode("-", $event->date)[0] . ", From  " . $event->debut . " to " . $event->fin),
                    "nom" => $event->nom,
                    "description" => $event->description,
                    "debut" => $event->debut,
                    "fin" => $event->fin,
                    "place" => $event->place,
                    "image" => $event->image,
                );

                require APP . 'view/details/index.php';
                require APP . 'view/_templates/footer.php';
            } else {
                header('location :' . URL . 'problem');
            }
        } else {
            header('Location:' . URL . 'problem');
        }
    }
}