<?php 
        function getCurrentUser($id){
           
            $connexion = getConnc();
            $table = "users";
            $sql = "SELECT * FROM " . $table . " WHERE id LIKE :id";
             // On prépare la requête
             $query = $connexion->prepare($sql);
             $query->bindParam(":id", $id);
             // On exécute la requête
             $query->execute();
             $result = $query->fetch();
             return $result ;
        }


        function getConnc(){
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
                return $connexion ;
        }

    
?>