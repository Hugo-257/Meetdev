<?php

class DB
{
    //On va utiliser le patron de conception singleton :: Une seule instance de db sera utilisée.
    private static  $connection;


    public  static function  getInstance()
    {   
        if (is_null(self::$connection)) {

            try {
                //***** unicaen db *******
                $connectionString = "mysql:host=mysql.info.unicaen.fr;port=3306;dbname=ntore221_dev;charset=utf8";
                $username = "ntore221";
                $password = "ahye1iiweeRooth9";

                //***** localhost db *******
                // $connectionString="mysql:host=localhost;dbname=meetdev;charset=utf8";
                // $username="root";
                // $password="";

                self::$connection = new PDO($connectionString, $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
        }
        return self::$connection;
    }
}
