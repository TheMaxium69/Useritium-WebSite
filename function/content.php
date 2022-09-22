<?php
function content($sidepage)
{

    if($sidepage == 1){

        require_once "./composant/content/index.phtml";

    } else {
        
        require_once "./composant/content/404.phtml";
    }

}
?>



