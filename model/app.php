<?php

require("database.php");

class App{
    const host="localhost";
    const dbname="blog";
    const user="root";
    const pass="";
    public static function getDB(){
    return Database::getInstance(self::host, self::dbname, self::user,
    self::pass);
    }
}