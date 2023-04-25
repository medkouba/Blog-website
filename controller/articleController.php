<?php
require_once ('model/article.php'); // chargement du modèle
class ArticleController{

    public static function getAll() {
        $articles = article::getAll();
        return $articles;//redirige vers la vue
    }


    public static function showArticleById() {
        session_start();
        $article = article::getbyId($_GET['idA']);
       
        $controller = "article";
        $userName = $_SESSION['userName']; 
                    //$page=$_GET['p'] ;
                    $user=User::getbyUserName($userName);
                    if($user->admin==1){
                        $userAction="Users";
                        $userActionPath="index1.php?controller=user&action=getAll";
                        $articlAction="Articles";
                        $articlActionPath="";
                    }
                    else{
                        $userAction="";
                        $userActionPath="";
                        $articlAction="";
                        $articlActionPath="";
                    }
       require ('view/welcom/single.php'); //redirige vers la vue
    }

    

    /*public static function UpdateArticle() {
        $idA = $_GET['idA'];
        $title = $_GET['title'];
        $description = $_GET['description'];
        $details = $_GET['details'];
        $image = $_GET['image'];
       
        private $tags;
        private $views;
        private $likes;
        private $idC;
        $status = article::delete($idA);
        if (!$status){
            $message='prodnotfound';
            //require ('view/produit/error.php');//redirige vers la vue
        }
        else{
            ArticleController::getAll();
        }
    }*/

    public static function delete() {
        $idA = $_GET['idA'];
        $status = article::delete($idA);
        if (!$status){
            $message='prodnotfound';
            //require ('view/produit/error.php');//redirige vers la vue
        }
        else{
            ArticleController::getAll();
        }
    }

    public static function add() {

    }

    public static function addProcess() {

    }
}