<?php

//DateBase
require_once "private/db.php";
$ConnectDB = mysqli_connect($host, $userDB, $passDB, $Database);

//Salt
require_once "private/salt.php";
$key = $salt;


if(!$ConnectDB){ ?>
    <div class='alert alert-dismissible alert-warning'>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        <h4 class='alert-heading'>Attention !</h4>
        <p class='mb-0'>Probleme de connection à la base de données.</p>
    </div>
    <?php
    die();
}

session_start();
$isLogged = false;

require_once "connect/signup.php";
require_once "connect/login.php";
require_once "update/public.php";
require_once "update/pass.php";
require_once "update/passForget.php";
require_once "update/picture.php";
require_once "update/skin.php";
require_once "update/cape.php";
require_once "update/email.php";

if (!empty($_SESSION['userNameLog'])){
    $isLogged = true;
}

if(isset($_POST['modeDeco']) && $_POST['modeDeco']== "on"){
    session_unset();
    $isLogged = false;
}

if(isset($_GET['modeDeco']) && $_GET['modeDeco']== "on"){
    session_unset();
    $isLogged = false;
}


// GET API EXTERNE
function getTyroServ(){

    require "api/private/db.php";

    // SELECT * FROM `users_tyroserv` WHERE `idUsers` = 2
    $maRequeteMinecraft = "SELECT * FROM users_tyroserv WHERE idUsers='$_SESSION[userIdLog]'";
    $resultatTyroServ = mysqli_query($ConnectDB, $maRequeteMinecraft);

    if ($resultatTyroServ){

        return mysqli_fetch_assoc($resultatTyroServ);

    } else {

        return null;
    }


}

function getProductServer(){

    require "api/private/db.php";

    $maRequeteServer = "SELECT * FROM product_server WHERE idUsers='$_SESSION[userIdLog]'";
    $resultatServer = mysqli_query($ConnectDB, $maRequeteServer);
    $data = array();

    if ($resultatServer) {
        while ($row = mysqli_fetch_assoc($resultatServer)) {
            array_push($data, $row);
        }
        return $data;
    } else {
        return null;
    }


}

function getProductPrestation(){

    require "api/private/db.php";

    $maRequetePrestation = "SELECT * FROM product_prestation WHERE idUsers='$_SESSION[userIdLog]'";
    $resultatPrestation = mysqli_query($ConnectDB, $maRequetePrestation);
    $data2 = array();

    if ($resultatPrestation) {
        while ($row = mysqli_fetch_assoc($resultatPrestation)) {
            array_push($data2, $row);
        }
        return $data2;
    } else {
        return null;
    }


}

function getEmailUser(){

    require "api/private/db.php";

    $maRequeteEmail = "SELECT * FROM users_email WHERE idUsers='$_SESSION[userIdLog]'";
    $resultatEmail = mysqli_query($ConnectDB, $maRequeteEmail);
    $data3 = array();

    if ($resultatEmail) {
        while ($row = mysqli_fetch_assoc($resultatEmail)) {
            array_push($data3, $row);
        }
        return $data3;
    } else {
        return null;
    }


}

function getOneEmailUser($email){

    require "api/private/db.php";

    $maRequeteOneEmail = "SELECT * FROM users_email WHERE email='$email' AND idUsers='$_SESSION[userIdLog]'";
    $resultatOneEmail = mysqli_query($ConnectDB, $maRequeteOneEmail);

    if ($resultatOneEmail) {
        return mysqli_fetch_assoc($resultatOneEmail);
    } else {
        return null;
    }


}


function createTicketPassword($idUsers)
{

    $token = md5(uniqid() . uniqid() . uniqid() . uniqid() . uniqid());

    require "api/private/db.php";
    $maRequeteTicketPassword = "INSERT INTO `users_password` (`idUsers`, `token`) VALUES ('$idUsers', '$token');";
    $resultTicketPassword= mysqli_query($ConnectDB, $maRequeteTicketPassword);

    if ($resultTicketPassword){
        return $token;
    } else {
        return false;
    }

}

function verifTicketPassword($token){


    require "api/private/db.php";
    $maRequeteTicketPasswordtoken = "SELECT * FROM users_password WHERE token='$token';";
    $resultTicketPasswordtoken = mysqli_query($ConnectDB, $maRequeteTicketPasswordtoken);

    if ($resultTicketPasswordtoken->num_rows){
        $ticketPassword = mysqli_fetch_assoc($resultTicketPasswordtoken);

        $dateCreate = new DateTime($ticketPassword['forgetDate']);
        $dateNow = new DateTime();

        $interval = $dateCreate->diff($dateNow);

        if($interval->h < 2){

            return $ticketPassword['idUsers'];

        } else {
            return false;
        }

    } else {
        return false;
    }

}

function verifAndUpateEmail($email, $token){

    require "api/private/db.php";

    $maRequeteOneEmailToken = "SELECT * FROM users_email WHERE email='$email' AND token='$token'";
    $resultatOneEmailToken = mysqli_query($ConnectDB, $maRequeteOneEmailToken);

    if ($resultatOneEmailToken->num_rows) {
        $resultatOneEmailToken = mysqli_fetch_assoc($resultatOneEmailToken);

        $idEmail = $resultatOneEmailToken['id'];
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');

        $maRequeteUpdateVerif = "UPDATE `users_email` SET `isVerif` = '1', `dateValidation` = '$date' WHERE `users_email`.`id` = '$idEmail'; ";
        $resultatUpdateVerif= mysqli_query($ConnectDB, $maRequeteUpdateVerif);

        if ($resultatUpdateVerif) {

            return true;

        } else {

            return false;

        }

    } else {
        return null;
    }

}


function getEmailByPseudo($pseudo){

    require "api/private/db.php";

    $maRequeteGetEmail = "SELECT * FROM users WHERE username='$pseudo'";
    $resultatGetEmail = mysqli_query($ConnectDB, $maRequeteGetEmail);

    if ($resultatGetEmail) {
        $users = mysqli_fetch_assoc($resultatGetEmail);
        return $users;
    } else {
        return null;
    }


}

function isLog($idUsers, $email, $username)
{

    require "api/private/db.php";

    $maRequeteGetEmail2 = "SELECT * FROM `users_email` WHERE `idUsers` = '$idUsers'; ";
    $resultatGetEmail2 = mysqli_query($ConnectDB, $maRequeteGetEmail2);

    if (!$resultatGetEmail2->num_rows) {

        $token = uniqid();

        $createEmail2 = "INSERT INTO `users_email` (`idUsers`, `email`, `token`, `isVerif`) VALUES ('$idUsers', '$email', '$token', '0'); ";
        $resultCreateEmail2 = mysqli_query($ConnectDB, $createEmail2);

    }

    sendingMailConnected($email, $username);

}

function sendingMailConnected($email, $username)
{




}


function sendingMailVerif($email, $idUser, $token)
{

    require "./app/env.php";

    $url = $env_connectUrl . "verif.php?email=$email&token=$token";

//    var_dump($url);
//    var_dump($email);
//    var_dump($_SESSION['userNameLog']);
    $pseudo = $_SESSION['userNameLog'];

    $to = $email;
    $subject = "Vérification de votre adresse e-mail";
    $content = '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #EBECF0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #EBECF0;
            padding: 50px;
            box-shadow: -5px -5px 20px #FFF, 5px 5px 20px #BABECC;
            border-radius: 5px;
        }
        h1 {
            text-transform: uppercase;
            margin-bottom: 30px;
            margin-top: 10px;
            font-family: \'Montserrat\', sans-serif;
            letter-spacing: -0.2px;
            font-size: 30px;
            font-weight: bold;
            /* color: #AAAEBB; */
            /* color: #0c92ff; */
            color: #1980d3;
            text-shadow: 1px 1px 1px #FFF;
            text-align: center;
        }
        p {
            color: #555555;
            line-height: 1.5;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #aaaaaa;
        }
        .button-container {
            text-align: center;
            margin: 41px 0;
        }
        
        .btn-morph {
            display: inline-block;
            text-decoration: none;
            color: white!important;
            max-width: 450px;
            border: 0;
            outline: 0;
            font-size: 16px;
            border-radius: 320px;
            padding: 19px;
            background-color: #1980d3;
            cursor: pointer;
            font-weight: 600;
        }
    
        .btn-morph:hover {
            background-color: #5da3db;
        }
    </style>
    <title>Vérification de votre adresse e-mail</title>
</head>
<body>
    <h4 style="width: 100%;
                        text-align: center;
                        font-family: \'Inter\', sans-serif;
                        text-transform: uppercase;
                        font-size: 18px;
                        letter-spacing: 3px;
                        font-weight: bold;
        margin-top: 47px;">
                Useritium <small style="font-size: 10px">Par Tyrolium</small>
            </h4>
            
    <div class="container">
        <h1>Vérification de votre adresse e-mail</h1>
        <p>Bonjour '.$pseudo.',</p>
        <p>Nous avons reçu une demande de vérification de votre adresse e-mail. Cliquez sur le bouton ci-dessous pour vérifier votre adresse e-mail :</p>
        <p class="button-container">
            <a href="'. $url .'" class="btn-morph">Vérifier mon adresse e-mail</a>
        </p>
        <p>Si vous n\'avez pas demandé la vérification de votre adresse e-mail, veuillez ignorer cet e-mail.</p>
        <p>Cordialement,</p>
        <p>L\'équipe Useritium</p>
        <div class="footer">
            <p>&copy; 2024 Tyrolium. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
';


    $headers = "From: USERITIUM par tyrolium <no-reply@useritium.fr>\r\n";
    $headers .= "Reply-To: officiel@tyrolium.fr\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if (mail($to, $subject, $content, $headers)){

        return true;

    } else {

        return false;

    }

}


function sendingMailPassword($user)
{

    $token = createTicketPassword($user['id']);

    if (!$token){

        return false;

    } else {

        require "./app/env.php";

        $url = $env_connectUrl . "password.php?token=$token";

//        var_dump($url);
//        var_dump($user['email']);

        $pseudo = $user['username'];

        $to = $user['email'];
        $subject = "Mots de passe oublié";
        $content = '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #EBECF0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #EBECF0;
            padding: 50px;
            box-shadow: -5px -5px 20px #FFF, 5px 5px 20px #BABECC;
            border-radius: 5px;
        }
        h1 {
            text-transform: uppercase;
            margin-bottom: 30px;
            margin-top: 10px;
            font-family: \'Montserrat\', sans-serif;
            letter-spacing: -0.2px;
            font-size: 30px;
            font-weight: bold;
            /* color: #AAAEBB; */
            /* color: #0c92ff; */
            color: #1980d3;
            text-shadow: 1px 1px 1px #FFF;
            text-align: center;
        }
        p {
            color: #555555;
            line-height: 1.5;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #aaaaaa;
        }
        .button-container {
            text-align: center;
            margin: 41px 0;
        }
        
        .btn-morph {
            display: inline-block;
            text-decoration: none;
            color: white!important;
            max-width: 450px;
            border: 0;
            outline: 0;
            font-size: 16px;
            border-radius: 320px;
            padding: 19px;
            background-color: #1980d3;
            cursor: pointer;
            font-weight: 600;
        }
    
        .btn-morph:hover {
            background-color: #5da3db;
        }
    </style>
    <title>Réinitialisation de mot de passe</title>
</head>
<body>
    <h4 style="width: 100%;
                        text-align: center;
                        font-family: \'Inter\', sans-serif;
                        text-transform: uppercase;
                        font-size: 18px;
                        letter-spacing: 3px;
                        font-weight: bold;
        margin-top: 47px;">
                Useritium <small style="font-size: 10px">Par Tyrolium</small>
            </h4>
            
    <div class="container">
        <h1>Réinitialisation de votre mot de passe</h1>
        <p>Bonjour '.$pseudo.',</p>
        <p>Nous avons reçu une demande de réinitialisation de votre mot de passe. Cliquez sur le bouton ci-dessous pour réinitialiser votre mot de passe :</p>
        <p class="button-container">
            <a href="'.$url.'" class="btn-morph">Réinitialiser mon mot de passe</a>
        </p>
        <p>Si vous n\'avez pas demandé la réinitialisation de votre mot de passe, veuillez ignorer cet e-mail.</p>
        <p>Cordialement,</p>
        <p>L\'équipe Useritium</p>
        <div class="footer">
            <p>&copy; 2024 Tyrolium. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
';

        $headers = "From: USERITIUM par tyrolium <no-reply@useritium.fr>\r\n";
        $headers .= "Reply-To: officiel@tyrolium.fr\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        if (mail($to, $subject, $content, $headers)){

            return true;

        } else {

            return false;

        }
        

    }




}