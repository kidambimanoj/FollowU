<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class db{
    
    private static $SERVERNAME = "localhost";
    private static $USERNAME = "root";
    private static $PASSWORD = "qwerty123";
    private static $DBNAME = "VStalk4U";

    public static function connect_to_db(){
        $conn = new mysqli(self::$SERVERNAME,self::$USERNAME, self::$PASSWORD,self::$DBNAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return(0);
        }else{
        return($conn);
        }
    }
}
?>