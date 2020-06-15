<?php 
    include('connection_db.php');
    if ( $_POST ) {
        $nbr =  $_POST['nbr'];
        $table = "questions";
        $table_rep = "reponses";
        // On écrit la requête
        $sql = "SELECT * FROM " . $table;
            // On prépare la requête
            $query = $connexion->prepare($sql);
            // On exécute la requête
            $query->execute();
            $result = $query->fetchAll();
            for($i=0 ; $i < count($result) ; $i++){
                $id = $result[$i]['id'] ;
                $sql = "SELECT * FROM " . $table_rep . " WHERE id_questions = :id_questions";
                // On prépare la requête
                $query_rep = $connexion->prepare($sql);
                $query_rep->bindParam(":id_questions", $id);
                // On exécute la requête
                $query_rep->execute();
                $result_rep = $query_rep->fetchAll();
                $result[$i]['reponses'] = $result_rep ; 
            }
            if ( !empty($result) ){
                echo json_encode($result);   
            }else{
                echo json_encode(["msg"=>"Not succes"]);
            } 
    }else{
        echo json_encode(["msg"=>"Methode no autoriser"]);
    }
?>