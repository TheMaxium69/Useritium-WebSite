<?php
if (isset($_POST['username']) && isset($_POST['password'])){
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
            }
            if( md5($passwordEntre).md5($key) == $vraiMotDePasse  ){
                $_SESSION["userIdLog"]= $userId;
                $_SESSION["userNameLog"]= $userName;
                $_SESSION["userDisNameLog"]= $userDisName;
                $_SESSION["userEmailLog"]= $userEmail;
                $_SESSION["userRoleLog"]= $userRole;
                header("location: index.php?true=login");
            }else{
                echo "mauvais mot de passe, $usernameEntre";
            }
        }else{
            echo "username inexistant dans la DB";
        }
    }else{

        echo "Veuillez entrer un username et un password";
    }
}
?>