<?php

function head($page)
{

    //Page
    if ($page == 1) {
        $title = "Useritium";
    } else if ($page == 2) {
        $title = "Connexion/Inscription | Useritium";
    } else if ($page == 3) {
        $title = "Panel Useritium";
    } else





    {
        $title = "404 | Exemple";
    }


    include "env.php";

    echo '<!doctype html> <html lang="fr"> <head>';
    require_once "composant/meta.phtml";
    echo '<title>' . $title . '</title>';
    echo '<link href="' . $env_urlLogo . '" rel="shortcut icon">';
    require_once "extension.php";
    echo '</head>';
}
