<?php


class Favorite
{


    public $id;
    public $personneId;
    public $eventId;

    function __construct($personneId, $event_id)
    {
        $this->personneId = $personneId;
        $this->eventId = $event_id;
    }


    static public function getFavoritesUser($id)
    {
        $connection = DB::getInstance();
        //Prepare the statement
        $stmt = $connection->prepare("select e.id, e.nom, e.place, e.description, e.image, e.date, e.debut, e.fin from favorite f, event e where f.personneId = :id and e.id = f.eventId;");

        //Binding the parameters with attributes of the object
        //Execute the statement
        $stmt->execute(['id' => $id]);

        $res = array();
        while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $el = new Event($event["nom"], $event["place"], $event["description"], $event["image"], $event["date"], $event["debut"], $event["fin"]);
            $el->setId($event["id"]);
            array_push($res, $el);
        }
        
        return $res;
    }

    static public function getFavoritesUserId($id)
    {
        $connection = DB::getInstance();
        //Prepare the statement
        $stmt = $connection->prepare("select e.id, e.nom, e.place, e.description, e.image, e.date, e.debut, e.fin from favorite f, event e where f.personneId = :id and e.id = f.eventId;");

        //Binding the parameters with attributes of the object
        //Execute the statement
        $stmt->execute(['id' => $id]);

        $el = array();
        while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($el, $event["id"]);
        }

        return $el;
    }


    public function addFavoritesUser()
    {
        $connection = DB::getInstance();
        //Prepare the statement
        $stmt = $connection->prepare("insert into favorite (personneId, eventId) values (:personneId,:eventId); ");

        //Binding the parameters with attributes of the object
        //Execute the statement
        $parameters = array(':personneId' => $this->personneId, ':eventId' => $this->eventId);
        $res = $stmt->execute($parameters);

        return $res;
    }

    static public function removeFavoritesUser($personneId, $eventId)
    {
        $connection = DB::getInstance();
        //Prepare the statement
        $stmt = $connection->prepare("delete from favorite where personneId = :personneId and eventId = :eventId ; ");

        //Binding the parameters with attributes of the object
        //Execute the statement
        $parameters = array(':personneId' => $personneId, ':eventId' => intval($eventId));
        $res = $stmt->execute($parameters);
        return $res;
    }



    public function setId($id)
    {
        $this->id = $id;
    }


}