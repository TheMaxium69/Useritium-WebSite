<?php
if(isset($_POST['usernameSignUp']) && isset($_POST['displayNameSignUp']) && isset($_POST['emailSignUp'])&& isset($_POST['passwordSignUp']) && isset($_POST['passwordRetypeSignUp']) ){
//    echo "tout est set" . "<br>";
    if( !empty($_POST['usernameSignUp']) &&  !empty($_POST['displayNameSignUp']) &&  !empty($_POST['emailSignUp']) &&  !empty($_POST['passwordSignUp']) &&  !empty($_POST['passwordRetypeSignUp']) ){
//        echo "tout est plein" . "<br>";
        $usernameSignUp = $_POST['usernameSignUp'];
        $displayNameSignUp = $_POST['displayNameSignUp'];
        $emailSignUp = $_POST['emailSignUp'];
        $passwordSignUp = $_POST['passwordSignUp'];
        $passwordRetypeSignUp = $_POST['passwordRetypeSignUp'];
        if($passwordSignUp == $passwordRetypeSignUp){
            $requeteUsername = "SELECT * FROM users WHERE username = '$usernameSignUp'";
            $resultUsername = mysqli_query($ConnectDB, $requeteUsername);
            if($resultUsername->num_rows == 0){
//                echo "on peut l'inscrire" . "<br>";
                $passwordSignUpCrypt = md5($passwordSignUp);
                $passwordSignUpCryptSalt = $passwordSignUpCrypt.md5($key);
                $requeteInsert = "INSERT INTO users(username, displayname, email, password, role) VALUES ('$usernameSignUp', '$displayNameSignUp', '$emailSignUp', '$passwordSignUpCryptSalt', 'user')";
                echo $requeteInsert;

                $resultInsert = mysqli_query($ConnectDB, $requeteInsert);

                if($resultInsert){
                    resultSignup(1, 141);

                }else{
                    //BDD
                    resultSignup(2, 240);
                }

            }else{
                //PSEUDO DEJA PRIS
                resultSignup(2,243);
            }
        }else{
            //MDP SOUCI
            resultSignup(2,242);
        }
    }else{
        //Pas tout remplie
        resultSignup(2, 241);
    }
}

function resultSignup($why, $code){

    if ($why = 1){
        header("location: index.php?true=" . $code );
    }

    if ($why = 2){
        header("location: index.php?err=" . $code );
    }

}
?>