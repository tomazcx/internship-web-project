<?php

namespace php\DAOs;
use PDO;

class connection {
    private static $instance;

    public static function getConn(){
        //if there isnt an instance for a pdo, it creates one. If there is, then returns it.

        if(!isset(self::$instance)):
            self::$instance = new PDO('mysql:host=localhost;dbname=db-1;charset=utf8', 'root', '');
        endif;
            return self::$instance;
    }
}