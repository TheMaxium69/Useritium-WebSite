<?php


if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['site'])){
    
    $redirect = $_POST['site'];
    $usernameEntre = $_POST['username'];
    $passwordEntre = $_POST['password'];
    if( $usernameEntre != "" && $passwordEntre !=""){
        $maRequete = "SELECT * FROM users WHERE username = '$usernameEntre'";
        $leResultatDeMaRequeteLogin = mysqli_query($ConnectDB, $maRequete);
        if(  $leResultatDeMaRequeteLogin->num_rows == 1){
            foreach( $leResultatDeMaRequeteLogin as $value){
                $vraiMotDePasse =  $value['password'];
                $userId =  $value['id'];
                $userName =  $value['username'];
                $userDisName =  $value['displayname'];
                $userEmail = $value['email'];
                $userRole = $value['role'];
                $userPp = $value['pp'];
            }
            if( md5($passwordEntre).md5($key) == $vraiMotDePasse  ){
                $_SESSION["userIdLog"]= $userId;
                $_SESSION["userNameLog"]= $userName;
                $_SESSION["userDisNameLog"]= $userDisName;
                $_SESSION["userEmailLog"]= $userEmail;
                $_SESSION["userRoleLog"]= $userRole;
                $_SESSION["userPpLog"]= $userPp;
                resultLogin(1, 641, $redirect);
            }else{
                //mauvais mot de passe
                
                resultLogin(2, 740, $redirect);
            }
        }else{
            //username inexistant dans la DB";
            
            resultLogin(2, 741, $redirect);
        }
    }else{

        //Veuillez entrer un username et un password";
        
        resultLogin(2, 742, $redirect);
    }
}


function resultLogin($why, $code, $redirect){

    require "././app/env.php";

    if ($why == 1){
        if ($code == 641){
            header("location: ". $env_connectUrl ."panel.php?true=Connexion a votre compte avec success");
        } else {
            header("location: ". $env_connectUrl ."panel.php?true=code:" . $code );
        }

    }

    if ($why == 2){
        if ($code == 740){
            header("location: ". $redirect ."connect.php?err=Mauvais mot de passe");
        } else
        if ($code == 741){
            header("location: ". $redirect ."connect.php?err=Username inexistant");
        } else
        if ($code == 742){
            header("location: ". $redirect ."connect.php?err=Champ non remplie");
        } else {
            header("location: ". $redirect ."connect.php?err=code:" . $code );
        }
    }

}
?>