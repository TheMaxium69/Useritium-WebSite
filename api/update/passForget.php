<?php


if (isset($_POST['passForgetToken']) && isset($_POST['passForgetNew']) && isset($_POST['passForgetNewC'])){

    if(!empty($_POST['passForgetToken']) && !empty($_POST['passForgetNew']) && !empty($_POST['passForgetNewC'])){

        $passEditNew = $_POST['passForgetNew'];
        $passEditNewC = $_POST['passForgetNewC'];
        $token = $_POST['passForgetToken'];

        if ($passEditNew == $passEditNewC){

            $newPass = $passEditNew;

            $verifToken = verifTicketPassword($token);

            if($verifToken){

                $id = $verifToken;
                $newPassChiff = md5($newPass).md5($key);

                // UPDATE `users` SET `password`='test' WHERE `id`=3
                $maRequete = "UPDATE users SET password='$newPassChiff' WHERE id='$id';";
                $resultUpdate = mysqli_query($ConnectDB, $maRequete);

                if($resultUpdate){

                    resultPassForget(1, "Mots de passe mise à jour", "");

                } else {

                    resultPassForget(2, "BDD Erreur", $token);
                }

            }else{
                // Change l'id dans lediteur de code
                resultPassForget(2, "Lien expiré ! " , $token);
            }
        } else{

            resultPassForget(2, "Vous n\'avez pas écrit le même mots de passe", $token);
        }
    }else{
        resultPassForget(2, "Pas tout remplie", $_POST['token']);
    }

}


function resultPassForget($why, $msg, $token){

    if ($why == 1){

        header("location: ". $env_connectUrl ."password.php?change=true");

    }

    if ($why == 2){

        header("location: ". $env_connectUrl ."password.php?token=".$token."&err=" . $msg );
    }

}
?>