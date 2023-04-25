<?php

require 'controller/routeur.php';
// require 'controller/w.php';
require "controller/welcomcontroller.php";
require "controller/categoriecontroller.php";
require "controller/articleController.php";

$routeur = new Routeur();
$routeur->routerRequete();
?>