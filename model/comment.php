<?php
require_once('app.php');
class Comment{

    private $user_id ;
    private $post_id ;
    private $content;
    private $created;
    



    public function __construct($user_id =null, $post_id =null, $content=null, $created=null){
        if (!is_null($user_id ) && !is_null($post_id ) && !is_null($content) && !is_null($created)) {

            $this->user_id  = $user_id ;
            $this->post_id  = $post_id ;
            $this->content = $content;
            $this->created = $created;
            
        }
    }


    public function save($code=null){
        $db=App::getDB();
        try{
            if($code==null){ //insertion d’un nouveau user
                $sql = "INSERT INTO comment(user_id, post_id, content, created) VALUES (?,?,?,?)";
                $params = array($this->user_id,$this->post_id, $this->content, $this->created);
                $resultat = $db->execute_query($sql, $params);
            }
            else{//MAJ d’un user existant
                $sql = "UPDATE comment SET user_id=:user_id,
            
                post_id=:post_id,
                content=:content,
                created=:created,
                WHERE idCom=:idCom";
        
                $params = array('user_id'=>$this->user_id,
        
                'post_id'=>$this->post_id,
                'content'=>$this->content,
                'created'=>$this->created,
                'idCom'=>$code);
                
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
            $sql = "DELETE FROM comment where idCom=?";
            $params = array($code);
            $resultat = $db->execute_query($sql,$params);
        }
        catch(PDOException $e ){
            return false;
        }
        return true;
    }
}