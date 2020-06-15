<?php 
    include('connection_db.php');
    if ( $_POST ) {
        $id =  $_POST['id'];
        $table = "users";
        // On écrit la requête
        $sql = "DELETE FROM " . $table . " WHERE id LIKE :id";
        // On prépare la requête
            $query = $connexion->prepare($sql);
            $query->bindParam(":id", $id);
        // On exécute la requête
            if ( $query->execute() ){
                echo json_encode(["msg"=>"succes"]);
            }else{
                echo json_encode(["msg"=>"Not succes"]);
            } 
    }else{
        echo json_encode(["msg"=>"Methode no autoriser"]);
    }
?>