<?php

function head($page)
{

    //Page
    if ($page == 1) {
        $title = "Accueil";
    } else if ($page == 2) {
        $title = "Connect";
    } else if ($page == 3) {
        $title = "Home Panel";
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
