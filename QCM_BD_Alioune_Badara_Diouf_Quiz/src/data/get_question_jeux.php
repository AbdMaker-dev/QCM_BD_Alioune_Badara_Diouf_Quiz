<?php 
    session_start();
    if ( $_POST ) {
        $n =  $_POST['n'];
            if ( !empty($_SESSION['question_a_poser']) ){
                if ( $n < count($_SESSION['question_a_poser']) ){
                    echo json_encode($_SESSION['question_a_poser'][$n]);  
                }else{
                    // fin de la partie et calcul du score final
                    echo json_encode(['question'=>"Fin de la parti il me rester a configure cette partie merci !!!"]);
                }
            }else{
                echo json_encode(["msg"=>"pas de questions"]);
            } 
    }else{
        echo json_encode(["msg"=>"Methode no autoriser"]);
    }
?>