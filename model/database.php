<?php
class Database { //classe singleton
    private $pdo;
    private static $instance = null;
    private function __construct($host,$dbname,$user,$pass){
    try{
        $dsn = "mysql:host=".$host."; dbname=".$dbname;
        $this->pdo = new PDO($dsn,$user,$pass);
        // set the PDO error mode to exception
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $except){
        echo"Echec de la connexion: ". $except->getMessage();
        die();
    }
    }
    public static function getInstance($host,$dbname,$user,$pass){
        if(is_null(self::$instance)){
            self::$instance = new Database($host,$dbname,$user,$pass);
        }
        return self::$instance;
    }

    public function execute_query($sql, $params = null){
        $resultat=0;
        if ($params == null) {
        $resultat=$this->pdo->query($sql);
        }
        else {
        
            $resultat=$this->pdo->prepare($sql);
            $resultat->execute($params);

        }

        return $resultat;
        
    }
}