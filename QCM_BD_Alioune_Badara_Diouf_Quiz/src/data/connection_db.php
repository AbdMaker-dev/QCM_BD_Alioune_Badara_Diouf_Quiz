<?php
    // Connexion à la base de données
    $host = "localhost";
    $db_name = "bd_Quiz";
    $username = "root";
    $password = "";
    $connexion = null;
        try{
            $connexion = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
            $connexion->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
?>