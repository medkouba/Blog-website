<?php
class Article{
    private $title;
    private $description;
    private $details;
    private $image;
    private $created;
    private $tags;
    private $views;
    private $likes;
    private $idC;
    public function __construct($title=null, $description=null, $details=null, $image=null, $tags=null, $views=null, $likes=null, $idC=null){
    if (!is_null($title) && !is_null($description) && !is_null($details) && !is_null($image) && !is_null($tags) && !is_null($$idC)) {
        $this->title = $title;
        $this->description = $description;
        $this->details = $details;
        $this->image = $image;
        $this->tags = $tags;
        $this->views = $views;
        $this->likes = $likes;
        $this->idC = $idC;
    }
    }
    public function __get($attr){
    if (!isset($this->attr))
        return "";
    else 
        return ($this->attr);
    }
    public function __set($attr,$value) {
        $this->attr = $value;
    }

    public function save($db,$code=null){

        try{
            if($code==null){ //insertion d’un nouveau article
                $sql = "INSERT INTO article(title, description, details, image, tags, views, idC) VALUES (?,?,?,?,?,?,?,?)";
                $params = array($this->title,$this->description, $this->details, $this->image, $this->tags, $this->views,$this->idC);
                $resultat = $db->execute_query($sql, $params);
            }
            else{//MAJ d’un article existant
                $sql = "UPDATE article SET 
                title=:title,
                description=:description,
                details=:details,
                image=:image,
                tags=:tags,
                views=:views,
                idC=:idC
                WHERE idA=:idA";
        
                $params = array('title'=>$this->title,
        
                'description'=>$this->description,
                'details'=>$this->details,
                'image'=>$this->image, 
                'tags'=>$this->tags, 
                'views'=>$this->views, 
                'idC'=>$this->idC,
                'idA'=>$code);
                
                $resultat = $db->execute_query($sql,$params);
                }
        }
        catch(PDOException $e ){
            if ($e->getCode() == 2300){
                $message=$e->getMessage();
            }
            return false;
            }
    return true;
    }

    public static function getAll(){
        $db=App::getDB();
        $sql = "SELECT * FROM article A join blogger B on A.idB=B.idB";
        $resultat = $db->execute_query($sql);
        if(!$resultat) {
            
            echo "Lecture impossible" ;
        }
        else{
            return $resultat->fetchAll(PDO::FETCH_OBJ);
        }
    }


    public static function getbyId($code){
        $db=App::getDB();
        $sql = "SELECT * FROM article A join blogger B on A.idB=B.idB join category C
        on A.idC=C.idC where idA=? ";
        $params = array($code);
        $resultat = $db->execute_query($sql,$params);
        if(!$resultat) {
            echo "Lecture impossible";
        }
        else{
            return $resultat->fetch(PDO::FETCH_OBJ);
        }
    }
/*                                      //tableau twil bel jointures koll 

    public static function getbyIdAll($code){
        $db=App::getDB();
        $sql = "SELECT * FROM article A join user U on A.id where idA=?";
        $params = array($code);
        $resultat = $db->execute_query($sql,$params);
        if(!$resultat) {
            echo "Lecture impossible";
        }
        else{
            return $resultat->fetch(PDO::FETCH_OBJ);
        }
    }*/
    
    public static function delete($code){
        $db=App::getDB();
        try{
            $sql = "DELETE FROM article where idA=?";
            $params = array($code);
            $resultat = $db->execute_query($sql,$params);
        }
        catch(PDOException $e ){
            return false;
        }
        return true;
    }
}