<?php


class Routeur{
    public function routerRequete() {
        if (isset($_GET["controller"]) && !empty($_GET["controller"])){
            $controller = $_GET['controller'].'controller';
            // On recupère l'action passée dans l'URL
            if (isset($_GET["action"]) && !empty($_GET["action"])){
                $action = $_GET['action'];
            }
            else{
                $action= "getAll";//action par défaut
            }
        }
        else if (isset($_POST["action"]) && isset($_POST["controller"])){
            $action = $_POST['action'];
            $controller = $_POST['controller'].'controller';
        }
        else{
            $controller="welcomcontroller";
            $action="welcom";
        }
        require_once $controller.'.php';
        $controller::$action(); // Appel de la méthode statique $action du Controller
        }
    }