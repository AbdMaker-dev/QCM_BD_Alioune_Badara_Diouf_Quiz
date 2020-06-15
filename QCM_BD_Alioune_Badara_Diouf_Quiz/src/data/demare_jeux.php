<?php 
    session_start();
    include('connection_db.php');
    //session_destroy();
    if ( $_POST ) {
        $n = $_POST['n'];
        if ( isset($_SESSION['question_a_poser']) ){
            echo json_encode($_SESSION['question_a_poser'][$n]); 
        }else{
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
                $_SESSION['question_a_poser'] = [];
                $i = rand( 0, (count($result)-1) );
                while( count($_SESSION['question_a_poser']) < 2 ){
                    if (!in_array($result[$i],$_SESSION['question_a_poser'])) {
                        $_SESSION['question_a_poser'][] = $result[$i];
                    }
                    $i = rand(0,count($result));
                }
                echo json_encode($_SESSION['question_a_poser'][0]);   
            }else{
                echo json_encode(["msg"=>"pas de question"]);
            } 
        }


    }else{
        echo json_encode(["msg"=>"Methode no autoriser"]);
    }
?>