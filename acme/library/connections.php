<?php
/* 
 * Database Connections
 */
function acmeConnect(){
 $server = "localhost";
 $database = "acme";
 $user = "iClient";
 $password ="a5XGN4g8bl4ZMA8d";
 $dsn = "mysql:host=$server;dbname=$database";
 $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
 
 try {
     $acmeLink = new PDO($dsn, $user, $password, $options);
     return $acmeLink;
 } 
 
 catch (PDOException $ex) {
     header('location: ../view/500.php');
 }
}

//acmeConnect();