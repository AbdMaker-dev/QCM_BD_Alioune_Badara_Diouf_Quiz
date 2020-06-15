<?php 
    include_once('connection_db.php');
    if ( $_POST ) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $log = $_POST['log'];
        $psw = $_POST['psw'];
        $role = $_POST['role'];
        $img = 'lien_img';
        
        $table = "users";
        // On écrit la requête
        $sql = "INSERT INTO " . $table . " VALUES (null,:nom,:prenom,:login,:password,:role,:img)";
            // On prépare la requête
            $query = $connexion->prepare($sql);
           // $query->bindParam(":id",null);
            $query->bindParam(":nom", $nom);
            $query->bindParam(":prenom", $prenom);
            $query->bindParam(":login", $log);
            $query->bindParam(":password", $psw);
            $query->bindParam(":role", $role);
            $query->bindParam(":img", $img);
            // On exécute la requête
            if ( $query->execute() ){
                echo json_encode(["msg"=>"succes"]);   
            }else{
                echo json_encode(["msg"=>"error"]);
            } 
    }else{
        echo json_encode(["msg"=>"Methode no autoriser"]);
    }
?>