<?php 
    include('connection_db.php');
    if ( $_POST ) {
        $role =  $_POST['role'];
        $table = "users";
        // On écrit la requête
        $sql = "SELECT * FROM " . $table . " WHERE role LIKE :role";
            // On prépare la requête
            $query = $connexion->prepare($sql);
            $query->bindParam(":role", $role);
            // On exécute la requête
            $query->execute();
            $result = $query->fetchAll();
            if ( !empty($result) ){
                echo json_encode($result);   
            }else{
                echo json_encode(["msg"=>"Not succes"]);
            } 
    }else{
        echo json_encode(["msg"=>"Methode no autoriser"]);
    }
?>