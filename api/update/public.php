<?php


if (isset($_POST['displayEdit']) && isset($_POST['idEdit'])){
    
            if( !empty($_POST['displayEdit']) && !empty($_POST['idEdit']) ){

                
                $displayEdit = $_POST['displayEdit'];
//                $emailEdit = $_POST['emailEdit'];
                $idEdit = $_POST['idEdit'];

                if($_SESSION['userIdLog'] == $idEdit){
                    
                    $id = $_SESSION['userIdLog'];

                        if($displayEdit != $_SESSION['userDisNameLog']){

                            // UPDATE `users` SET `displayname`='TheMaximeSan',`email`='test@test.fr' WHERE `id`=2
                            $maRequete = "UPDATE users SET displayname='$displayEdit' WHERE id='$id'";
                            $resultUpdate = mysqli_query($ConnectDB, $maRequete);

                            if($resultUpdate){

                                $_SESSION["userDisNameLog"]= $displayEdit;

                                resultPublic(1, "Mise à jour effectuer");

                            } else {
                                
                                resultPublic(2, "BDD Erreur");
                            } 



                        }else{

                            resultPublic(2, "Tu n\'a rien changer");
                        }
                }else{
                    // Change l'id dans lediteur de code
                    resultPublic(2, "Tu vas rien faire toi ! ;)");
                }
            }else{
                resultPublic(2, "Pas tout remplie");
            }

}


function resultPublic($why, $msg){

    if ($why == 1){
        
        header("location: ". $env_connectUrl ."panel.php?p=2&true=" . $msg );

    }

    if ($why == 2){
        
        header("location: ". $env_connectUrl ."panel.php?p=2&err=" . $msg );
    }

}
?>