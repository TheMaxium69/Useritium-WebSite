<?php
function content($sidepage)
{

    if($sidepage == 1){

        require_once "./composant/content/index.phtml";

    } else if($sidepage == 2) {
        
        require_once "./composant/content/account.phtml";
    } else if($sidepage == 7) {
        
        require_once "./composant/content/service.phtml";
    } else if($sidepage == 8) {
        
        require_once "./composant/content/game.phtml";
    } else if($sidepage == 9) {
        
        require_once "./composant/content/server.phtml";
    } else {
        
        require_once "./composant/content/404.phtml";
    }

}
?>



