<?php 
    include('connection_db.php');
    if ( $_POST ) {
        $n =  $_POST['id'];
        $table = "questions";
        $table_rep = "reponses";
        // On écrit la requête
        $sql = "SELECT * FROM " . $table . " WHERE id = :id";
            // On prépare la requête
            $query = $connexion->prepare($sql);
            $query->bindParam(":id", $n);
            // On exécute la requête
            $query->execute();
            $result = $query->fetch();
                $id = $result['id'] ;
                $sql = "SELECT * FROM " . $table_rep . " WHERE id_questions = :id_questions";
                // On prépare la requête
                $query_rep = $connexion->prepare($sql);
                $query_rep->bindParam(":id_questions", $id);
                // On exécute la requête
                $query_rep->execute();
                $result_rep = $query_rep->fetchAll();
                $result['reponses'] = $result_rep ; 
            if ( !empty($result) ){
                echo json_encode($result);   
            }else{
                echo json_encode(["msg"=>"Not succes"]);
            } 
    }else{
        echo json_encode(["msg"=>"Methode no autoriser"]);
    }
?>