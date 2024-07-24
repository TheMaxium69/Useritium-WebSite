<?php

function head($page)
{


    if(empty($_COOKIE['DesktopApp'])){

        //Page
        if ($page == 1) {
            $title = "Useritium";
        } else if ($page == 2) {
            $title = "Useritium - Connexion/Inscription";
        } else if ($page == 3) {
            $title = "Useritium - Panel";
        } else if ($page == 4) {
            $title = "Useritium - Verification";
        } else if ($page == 5) {
            $title = "Useritium - Mots de passe";
        } else

        {
            $title = "Useritium - 404 ";
        }

    } else {

        $title = "Useritium App";

    }

    include "env.php";

    echo '<!doctype html> <html lang="fr"> <head>';
    require_once "composant/meta.phtml";
    echo '<title>' . $title . '</title>';
    echo '<link href="' . $env_urlLogoOnglet . '" rel="shortcut icon">';
    require_once "extension.php";
    echo '</head>';
}
