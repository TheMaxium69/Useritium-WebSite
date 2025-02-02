<?php

//PROD or DEV
$APP_ENV = "DEV";


//Variable Share

$env_urlFile = "./extension/";
$env_urlLogo = "./assets/logo.png";
$env_urlLogoOnglet = "./assets/onglet.png";

if($APP_ENV == "PROD"){
    
    $env_connectUrl = "https://useritium.fr/";
    $env_uploadUrl = "https://useritium.fr/uploads/";
    $env_urlGamenium = "https://vps209.tyrolium.fr/";

} else if ($APP_ENV == "DEV"){

    $env_connectUrl = "http://127.0.0.1/Useritium-WebSite/";
    $env_uploadUrl = "http://127.0.0.1/Useritium-WebSite/uploads/";
    $env_urlGamenium = "https://localhost:8000/";

}


