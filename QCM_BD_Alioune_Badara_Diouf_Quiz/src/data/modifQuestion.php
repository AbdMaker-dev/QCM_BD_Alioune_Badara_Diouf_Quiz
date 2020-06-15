<?php 
    include_once('connection_db.php');
    if ( $_POST ) {
        $reponse = [];
        $bon_reponse = [];
        
       $n = 1 ;
        while (isset( $_POST['rep_'.$n])) {
            $reponse[] = $_POST['rep_'.$n] ;
            if (in_array($_POST['rep_'.$n],$_POST['chk'])) {
            $bon_reponse[] = $_POST['rep_'.$n] ;
            }
            $n++;
        }
        $qes = ['ques'=>$_POST['ques'],'nbr_poit'=>$_POST['nbr_poit'],'chx'=>$_POST['chx'],'rep'=>$reponse,'b_rep'=>$bon_reponse];
        $table = "questions";
        $tab_reponse = "reponses";
        // On écrit la requête
        $sql = "UPDATE " . $table . " SET question = :question,type = :type,point = :point WHERE id=:id";
            // On prépare la requête
            $query = $connexion->prepare($sql);
            $query->bindParam(":id", $_POST['id']);
            $query->bindParam(":question", $_POST['ques']);
            $query->bindParam(":type", $_POST['chx']);
            $query->bindParam(":point",intval($_POST['nbr_poit']));
            // On exécute la requête
            if ( $query->execute() ){
                $sql2 = $sql2 = "DELETE FROM ". $tab_reponse . " WHERE id_questions = :id_questions" ;
                $query = $connexion->prepare($sql2);
                $query->bindParam(":id_questions",$_POST['id']);
                if ($query->execute()){
                    for ($i=0; $i < count($reponse) ; $i++) {
                        $sql = "INSERT INTO " . $tab_reponse . " VALUES (null,:reponse,:etat,:id_questions)";
                        $query = $connexion->prepare($sql);
                         $query->bindParam(":reponse",$reponse[$i]);
                         $etat = 0;
                         if (in_array($reponse[$i],$bon_reponse)){
                             $etat = 1;
                         }
                         $query->bindParam(":etat", $etat);
                         $query->bindParam(":id_questions",$_POST['id']);
                         if ($query->execute()) {
                             $msg = "succes";
                         }else{
                            $msg = "serror 2";
                         }
                       }
                }
                echo json_encode(["msg"=>"succes"]);
            }else{
                echo json_encode(["msg"=>"error 1"]);
            } 
    }else{
        echo json_encode(["msg"=>"Methode no autoriser"]);
    }
?>