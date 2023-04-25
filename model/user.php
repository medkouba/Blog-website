<?php
require_once('app.php');
class User{
    private $firstName;
    private $lastName;
    private $userName;
    private $email;
    private $password;
    private $gender;
    private $created;
    private $admin;
    public function __construct($firstName=null, $lastName=null, $userName=null, $email=null, $password=null, $gender=null,$created=null, $admin=null){
    if (!is_null($firstName) && !is_null($lastName) && !is_null($userName) && !is_null($email) && !is_null($password) && !is_null($gender) && !is_null($admin)) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->gender = $gender;
        $this->admin = $admin;
        $this->created=$created;
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

    public function save($code=null){
        $db=App::getDB();
        try{
            if($code==null){ //insertion d’un nouveau user
                $sql = "INSERT INTO user(firstName, lastName, userName, email, password, gender, admin) VALUES (?,?,?,?,?,?,?)";
                $params = array($this->firstName,$this->lastName, $this->userName, $this->email, $this->password, $this->gender, $this->admin);
                $resultat = $db->execute_query($sql, $params);
            }
            else{//MAJ d’un user existant
                $sql = "UPDATE user SET firstName=:firstName,
            
                lastName=:lastName,
                userName=:userName,
                email=:email,
                password=:password,
                gender=:gender,
                admin=:admin
                WHERE idU=:idU";
        
                $params = array('firstName'=>$this->firstName,
        
                'lastName'=>$this->lastName,
                'userName'=>$this->userName,
                'email'=>$this->email,
                'password'=>$this->password, 
                'gender'=>$this->gender,  
                'admin'=>$this->admin,
                'idU'=>$code);
                
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
        $sql = "SELECT * FROM user";
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
        $sql = "SELECT * FROM user where idU=?";
        $params = array($code);
        $resultat = $db->execute_query($sql,$params);
        if(!$resultat) {
            
            echo "Lecture impossible, code"; 
        }
        else{
            return $resultat->fetch(PDO::FETCH_OBJ);
        }
    }


    public static function getbyUserName($userName){
        $db=App::getDB();
        $sql = "SELECT * FROM user where userName=?";
        $params = array($userName);
        $resultat = $db->execute_query($sql,$params);
        
        return $resultat->fetch(PDO::FETCH_OBJ);
        
    }


    public static function delete($code){
        $db=App::getDB();
        try{
            $sql = "DELETE FROM user where idU=?";
            $params = array($code);
            $resultat = $db->execute_query($sql,$params);
        }
        catch(PDOException $e ){
            return false;
        }
        return true;
    }

}