<?php
class Event
{
    public $nom;

    public $place;

    public $description;
    public $date;

    public $debut;

    public $fin;

    public $image;

    public $id;

    public function __construct($nom,$place , $description, $image,$date, $debut, $fin)
    {
        $this->nom = $nom;
        $this->place=$place;
        $this->description = $description;
        $this->date = $date;
        $this->debut = $debut;
        $this->fin = $fin;
        $this->image = $image;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function addEvent()
    {

        //Get instance of pdo
        $db = DB::getInstance();
        $sql = "INSERT INTO event(nom, place ,description, image, date, debut, fin) values (:nom, :place , :description,:image,:date,:debut,:fin)";
        $stmt = $db->prepare($sql);
        $parameters = array(':nom' => $this->nom,':place' => $this->place, ':description' => $this->description, ':image' => $this->image, ':date' => $this->date, ':debut' => $this->debut, ':fin' => $this->fin);
        $res = $stmt->execute($parameters);
        // Execute statement and return boolean result
        return $res;
    }


    public function updateEvent()
    {
        //Get instance of pdo
        $db = DB::getInstance();
        $sql = "update event set  nom= :nom , place = :place , description = :description , image = :image, date = :date, debut = :debut, fin = :fin where id= :id";
        $stmt = $db->prepare($sql);
        $parameters = array(':nom' => $this->nom,':place' => $this->place, ':description' => $this->description, ':image' => $this->image, ':date' => $this->date, ':debut' => $this->debut, ':fin' => $this->fin, ":id" => $this->id);
        $res = $stmt->execute($parameters);
        // Execute statement and return boolean result
        return $res;
    }


    static public function getAllEvents()
    {
        //Get instance of pdo
        $connection = DB::getInstance();
        $data = $connection->query("select * from event;")->fetchAll(PDO::FETCH_ASSOC);
        $events = array();
        foreach ($data as $event) {
            $el = new Event($event["nom"], $event["place"], $event["description"],$event["image"] , $event["date"], $event["debut"], $event["fin"]);
            $el->setId($event["id"]);
            array_push($events, $el);
        }
        return $events;
    }

    static public function getEventById($id)
    {   
        $connection = DB::getInstance();
        //Prepare the statement
        $stmt = $connection->prepare("select * from event where id=:id;");

        //Binding the parameters with attributes of the object
        //Execute the statement
        $stmt->execute(['id' => $id]);
        $el = null;
        while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $el = new Event($event["nom"], $event["place"], $event["description"], $event["image"], $event["date"], $event["debut"],$event["fin"]);
            $el->setId($event["id"]);
        }

        $connection = null;
        return $el;
    }

    static public function getFavoritesUser($id)
    {   
        $connection = DB::getInstance();
        //Prepare the statement
        $stmt = $connection->prepare("select e.id, e.nom, e.place, e.description, e.image, e.date, e.debut, e.fin from favorite f, event e where f.personneId = :id and e.id = f.eventId;");

        //Binding the parameters with attributes of the object
        //Execute the statement
        $stmt->execute(['id' => $id]);
        $el = null;
        while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $el = new Event($event["nom"], $event["place"], $event["description"], $event["image"], $event["date"], $event["debut"],$event["fin"]);
            $el->setId($event["id"]);
        }

        $connection = null;
        return $el;
    }

  

}
?>