<?php
function content($sidepage)
{

    if($sidepage == 1){

        require_once "./composant/content/index.phtml";

    } else if($sidepage == 2) {
        
        require_once "./composant/content/account.phtml";
    } else if($sidepage == 3) {
        
        require_once "./composant/content/erreur.phtml";
    } else if($sidepage == 4) {
        
        require_once "./composant/content/erreur.phtml";
    } else if($sidepage == 5) {
        
        require_once "./composant/content/erreur.phtml";
    } else if($sidepage == 6) {
        
        require_once "./composant/content/erreur.phtml";
    } else if($sidepage == 7) {
        
        require_once "./composant/content/service.phtml";
    } else if($sidepage == 8) {
        
        require_once "./composant/content/game.phtml";
    } else if($sidepage == 9) {
        
        require_once "./composant/content/server.phtml";
    } else if($sidepage == 10) {

        require_once "./composant/content/tyroserv.phtml";
    } else if($sidepage == 11) {

        require_once "./composant/content/gamenium.phtml";
    } else {
        
        require_once "./composant/content/404.phtml";
    }

}
?>



