<?php

if(isset($_POST['usernameSignUp']) && isset($_POST['emailSignUp'])&& isset($_POST['passwordSignUp']) && isset($_POST['site'])){

    $redirect = $_POST['site'];
//    echo "tout est set" . "<br>";
    if( !empty($_POST['usernameSignUp']) && !empty($_POST['emailSignUp']) &&  !empty($_POST['passwordSignUp']) ){
//        echo "tout est plein" . "<br>";
        $usernameSignUp = $_POST['usernameSignUp'];
        $emailSignUp = $_POST['emailSignUp'];
        $passwordSignUp = $_POST['passwordSignUp'];

            $requeteUsername = "SELECT * FROM users WHERE username = '$usernameSignUp'";
            $resultUsername = mysqli_query($ConnectDB, $requeteUsername);
            if($resultUsername->num_rows == 0){
//                echo "on peut l'inscrire" . "<br>";
                $passwordSignUpCrypt = md5($passwordSignUp);
                $passwordSignUpCryptSalt = $passwordSignUpCrypt.md5($key);
                $requeteInsert = "INSERT INTO users(username, email, password, role) VALUES ('$usernameSignUp', '$emailSignUp', '$passwordSignUpCryptSalt', 'user')";
//                echo $requeteInsert;

                $resultInsert = mysqli_query($ConnectDB, $requeteInsert);

                if($resultInsert){


                    $recupLeCompteCreer = "SELECT * FROM `users` WHERE `username` LIKE '$usernameSignUp' AND `email` LIKE '$emailSignUp' AND `password` LIKE '$passwordSignUpCryptSalt' ";
                    $resultRecupLeCompteCreer = mysqli_query($ConnectDB, $recupLeCompteCreer);

                    $tableUser = mysqli_fetch_assoc($resultRecupLeCompteCreer);

                    $_SESSION["userIdLog"]= $tableUser['id'];
                    $_SESSION["userNameLog"]= $tableUser['username'];
                    $_SESSION["userDisNameLog"]= $tableUser['displayname'];
                    $_SESSION["userEmailLog"]= $tableUser['email'];
                    $_SESSION["userRoleLog"]= $tableUser['role'];
                    $_SESSION["userPpLog"]= $tableUser['pp'];

                    $iduser = $tableUser['id'];
                    $emailUser = $tableUser['email'];
                    $token = uniqid();

                    $createEmail = "INSERT INTO `users_email` (`idUsers`, `email`, `token`, `isVerif`) VALUES ('$iduser', '$emailUser', '$token', '0'); ";
                    $resultCreateEmail = mysqli_query($ConnectDB, $createEmail);

                    resultSignup(1, 141, $redirect);

                }else{
                    //BDD
                    resultSignup(2, 240, $redirect);
                }

            }else{
                //PSEUDO DEJA PRIS
                resultSignup(2,241, $redirect);
            }

    }else{
        //Pas tout remplie
        resultSignup(2, 242, $redirect);
    }
}

function resultSignup($why, $code, $redirect){

    if ($why == 1){
        if ($code == 141){
            header("location: ". $redirect ."panel.php?p=1&true=Compte bien créé");
        } else {
            header("location: ". $redirect ."panel.php?p=1&true=code:" . $code );
        }

    }

    if ($why == 2){
        if ($code == 240){
            header("location: ". $redirect ."connect.php?err=Erreur de base de donnée");
        } else
        if ($code == 241){
            header("location: ". $redirect ."connect.php?err=Pseudo déjà utiliser");
        } else
        if ($code == 242){
            header("location: ". $redirect ."connect.php?err=Champ non remplie");
        } else {
            header("location: ". $redirect ."connect.php?err=code:" . $code );
        }
    }

}
?>