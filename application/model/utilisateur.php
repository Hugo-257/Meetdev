<?php

class Utilisateur
{

    public $nom;

    public $prenom;

    public $email;

    public $password;


    function __construct($nom, $prenom, $email, $password)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }


    public function addUtilisateur()
    {
        $db = DB::getInstance();
        $sql = "INSERT INTO utilisateur(nom,prenom,email,password) values (:nom,:prenom,:email,:password)";
        $query = $db->prepare($sql);
        $parameters = array(':nom' => $this->nom, ':prenom' => $this->prenom, ':email' => $this->email, ':password' => $this->password);
        $query->execute($parameters);
    }


    public static function deleteUtilisateur($id)
    {
        $db = DB::getInstance();
        $sql = "DELETE  FROM utilisateur WHERE id = :id";
        $query = $db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
    }


    public static function getUtilisateur($email, $password)
    {
        $db = DB::getInstance();
        $sql = "SELECT id, nom, prenom, email, password FROM utilisateur WHERE email = :email   LIMIT 1";
        $query = $db->prepare($sql);
        $parameters = array(':email' => $email);
        $query->execute($parameters);

        $res = $query->fetch(PDO::FETCH_ASSOC);
        if (!is_bool($res)) {
            if (!password_verify($password, $res["password"])) {
                return false;
            }
        }
        return $res;
    }

}