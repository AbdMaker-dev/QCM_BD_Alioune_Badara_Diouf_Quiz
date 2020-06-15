<?php 

        include('connection_db.php');
        $log = 'Abd2020';
        $psw = 'Abd2020';
        $table = "users";
        // On écrit la requête
        $sql = "SELECT * FROM " . $table . " WHERE login LIKE :login AND  password LIKE :password ";

            // On prépare la requête
            $query = $connexion->prepare($sql);

            $query->bindParam(":login", $log);
            $query->bindParam(":password", $psw);
            // On exécute la requête
            $query->execute();
            $result = $query->fetch();
            if ( !empty($result) ) {
                echo json_encode($result);   
            }else{
                echo json_encode(["msg"=>"Not succes"]);
            } 
?>