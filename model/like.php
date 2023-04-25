<?php
require_once('app.php');
class Like{

    private $user_id ;
    private $post_id ;
    
    public function __construct($user_id =null, $post_id =null){
        if (!is_null($user_id ) && !is_null($post_id )) {

            $this->user_id  = $user_id ;
            $this->post_id  = $post_id ;
            
        }
    }


    public function save($code=null){
        $db=App::getDB();
        try{
            if($code==null){ //insertion d’un nouveau user
                $sql = "INSERT INTO likes(user_id, post_id) VALUES (?,?)";
                $params = array($this->user_id,$this->post_id);
                $resultat = $db->execute_query($sql, $params);
            }
            else{//MAJ d’un user existant
                $sql = "UPDATE likes SET user_id=:user_id,
            
                post_id=:post_id,
                WHERE idLike=:idLike";

                $params = array('user_id'=>$this->user_id,
        
                'post_id'=>$this->post_id,
                'idLike'=>$code);
                
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


    public static function delete($code){
        $db=App::getDB();
        try{
            $sql = "DELETE FROM likes where idLike=?";
            $params = array($code);
            $resultat = $db->execute_query($sql,$params);
        }
        catch(PDOException $e ){
            return false;
        }
        return true;
    }
}