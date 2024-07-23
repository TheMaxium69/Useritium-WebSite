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
require_once "update/cape.php";

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
