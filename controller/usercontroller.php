<?php
require_once ('model/user.php'); // chargement du modèle
class UserController{

    public static function getAll() {
        $users = User::getAll();
        $controller = "user";
        require ('view/listuser/listuser.php'); //redirige vers la vue
    }


    public static function showUserDetails() {
        $user = User::getbyId($_GET['idU']);
        if($user->admin==0){
            $action="Upgrade to admin";
        }
        else{
            $action="Downgrade to user";
        }
        $controller = "user";
        require ('view/userdetails/userdetails.php'); //redirige vers la vue
    }

    public static function updateUser() {
        $controller = "user";
        $idU = $_GET['idU'];
        $oldUser = User::getbyId($idU);
        if($oldUser->admin==0){
            $admin=1;
        }
        else{
            $admin=0;
        }
        $user= new User($oldUser->firstName,$oldUser->lastName,$oldUser->userName,$oldUser->email,$oldUser->password,$oldUser->gender,$oldUser->created,$admin);
        $user->save($oldUser->idU);
        self::showUserDetails();
    }

    public static function delete() {
        $idU = $_GET['idU'];
        $status = User::delete($idU);
        if (!$status){
            $message='prodnotfound';
            require ('view/produit/error.php');//redirige vers la vue
        }
        else{
            userController::getAll();
        }
    }

    public static function add() {

    }

    public static function addProcess() {

    }
}