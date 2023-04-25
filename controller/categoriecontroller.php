<?php
require_once "model/categorie.php";
class CategoryController{

    public static function getcategory(){
        $categorys=Category::getAll();
        return $categorys;
    }

}