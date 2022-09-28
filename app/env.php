<?php

//PROD or DEV
$APP_ENV = "DEV";


//Variable Share

$env_urlFile = "./extension/";
$env_urlLogo = "./assets/logo.png";
$env_urlLogoOnglet = "./assets/onglet.png";

if($APP_ENV == "PROD"){
    
    $env_connectUrl = "https://useritium.fr/";

} else if ($APP_ENV == "DEV"){

    $env_connectUrl = "http://localhost/TyroMail/";

}
