<?php


if (isset($_POST['passEditNewOld']) && isset($_POST['passEditNew']) && isset($_POST['passEditNewC']) && isset($_POST['idEditPass'])){
    
    if(!empty($_POST['passEditNewOld']) && !empty($_POST['passEditNew']) && !empty($_POST['passEditNewC']) && !empty($_POST['idEditPass']) ){

        $passEditNew = $_POST['passEditNew'];
        $passEditNewC = $_POST['passEditNewC'];

        if ($passEditNew == $passEditNewC){

            $newPass = $passEditNew;
            $idEdit = $_POST['idEditPass'];

                if($_SESSION['userIdLog'] == $idEdit){

                    $id = $_SESSION['userIdLog'];
                    $passOld = $_POST['passEditNewOld'];

                    $recupMDP = "SELECT password FROM users WHERE id='$id'";
                    $resultMDP = mysqli_query($ConnectDB, $recupMDP);

                    if($resultMDP){

                        foreach( $resultMDP as $value){
                            $vraiMotDePasse =  $value['password'];
                        }
                        
                        if( md5($passOld).md5($key) == $vraiMotDePasse ){

                                $newPassChiff = md5($newPass).md5($key);

                                // UPDATE `users` SET `password`='test' WHERE `id`=3
                                $maRequete = "UPDATE users SET password='$newPassChiff' WHERE id='$id'";
                                $resultUpdate = mysqli_query($ConnectDB, $maRequete);

                                if($resultUpdate){

                                    resultPublic(1, "Mots de passe mise à jour");

                                } else {
                                    
                                    resultPublic(2, "BDD Erreur");
                                } 
                        

                        } else {
                            
                            resultPass(2, "Ton ancien Mots de passe est faux");
                        }

                    } else {
                        
                        resultPass(2, "BDD Erreur");
                    } 
                }else{
                    // Change l'id dans lediteur de code
                    resultPass(2, "Tu vas rien faire toi ! ;)");
                }
        } else{

            resultPass(2, "Vous n\'avez pas écrit le même mots de passe");
        }            
    }else{
        resultPass(2, "Pas tout remplie");
    }

}


function resultPass($why, $msg){

    if ($why == 1){
        
        header("location: ". $env_connectUrl ."panel.php?p=2&true=" . $msg );

    }

    if ($why == 2){
        
        header("location: ". $env_connectUrl ."panel.php?p=2&err=" . $msg );
    }

}
?>