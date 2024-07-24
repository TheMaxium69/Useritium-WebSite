<?php

if (!empty($_POST['idCapeSelected']) && !empty($_POST['idCapeOld']) && !empty($_POST['idEdit'])) {

    $idEdit = $_POST['idEdit'];
    $idCapeSelected = $_POST['idCapeSelected'];
    $idCapeOld = $_POST['idCapeOld'];

    var_dump($_POST);


    resultCape(1, "cc");

    if ($idCapeSelected != $idCapeOld) {

        if ($idEdit == $_SESSION['userIdLog']) {

            $maRequete = "UPDATE users_tyroserv SET cape='$idCapeSelected' WHERE idUsers='$idEdit'";
            $resultUpdate = mysqli_query($ConnectDB, $maRequete);

            if ($resultUpdate) {

                resultSkin(1, "Enregistrement de votre cape minecraft.");

            } else {

                resultSkin(2, "BDD Erreur");
            }

        } else {

            resultSkin(2, "Permission Erreur");

        }

    } else {

        resultSkin(1, "Enregistrement de votre cape minecraft.");

    }



}


function resultCape($why, $msg)
{

    require "app/env.php";

    if ($why == 1) {

        header("location: " . $env_connectUrl . "panel.php?p=10&true=" . $msg);

    }

    if ($why == 2) {

        header("location: " . $env_connectUrl . "panel.php?p=10&err=" . $msg);
    }
}