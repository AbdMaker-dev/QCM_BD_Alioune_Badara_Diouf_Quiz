<?php 
    include('connection_db.php');
    if ( $_POST ) {
        $id =  $_POST['id'];
        $table = "questions";
        $table_rep = "reponses";
        // On écrit la requête
        $sql = "DELETE FROM " . $table_rep . " WHERE id_questions LIKE :id_questions";
        // On prépare la requête
        $query = $connexion->prepare($sql);
        $query->bindParam(":id_questions", $id);
        if ($query->execute()) {
            $sql = "DELETE FROM " . $table . " WHERE id LIKE :id";
            // On prépare la requête
                $query = $connexion->prepare($sql);
                $query->bindParam(":id", $id);
            // On exécute la requête
                if ( $query->execute() ){
                    echo json_encode(["msg"=>"succes"]);
                }
        }else{
            echo json_encode(["msg"=>"No succes"]);
        }
    }else{
        echo json_encode(["msg"=>"Methode no autoriser"]);
    }
?>