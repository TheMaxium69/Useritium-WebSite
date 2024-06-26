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
require_once "update/picture.php";
require_once "update/skin.php";

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
