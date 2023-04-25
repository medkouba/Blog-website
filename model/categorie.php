<?php
require_once('app.php');
class Category{

    private $name;

    public function __construct($name=null){
        if (!is_null($name) ) {

            $this->name = $name;
        }
    }

    public static function getAll(){
        $db=App::getDB();
        $sql = "SELECT * FROM category";
        $resultat = $db->execute_query($sql);
        if(!$resultat) {
           
            echo "Lecture impossible, code";
        }
        else{
            return $resultat->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public static function getbyId($code){
        $db=App::getDB();
        $sql = "SELECT * FROM category where idC=?";
        $params = array($code);
        $resultat = $db->execute_query($sql,$params);
        if(!$resultat) {

            echo "Lecture impossible, code";
        }
        else{
            return $resultat->fetch(PDO::FETCH_OBJ);
        }
    }
    

}