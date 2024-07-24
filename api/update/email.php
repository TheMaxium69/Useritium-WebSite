<?php

if (!empty($_GET['delemail'])){

    $idMail = $_GET['delemail'];

    require "api/private/db.php";

    $maRequeteEmail = "SELECT * FROM users_email WHERE id='$idMail'";
    $resultatEmail = mysqli_query($ConnectDB, $maRequeteEmail);

    if ($resultatEmail) {
        $email = mysqli_fetch_assoc($resultatEmail);

        if ($email['idUsers'] == $_SESSION['userIdLog']) {

            $noMailVerif = 1;

            if ($email['email'] == $_SESSION['userEmailLog']) {
                $noMailVerif = 2;
            }


            if ($noMailVerif == 1) {

                mysqli_query($ConnectDB, "DELETE FROM users_email WHERE id='$idMail'");

                header('Location: panel.php?p=2&true=Mail supprimé');

            } else {

                header('Location: panel.php?p=2&err=Le Mail par défaut ne peut pas être supprimé');

            }

        } else {

            header('Location: panel.php?p=2&err=Mail introuvable');

        }

    } else {

        header('Location: panel.php?p=2&err=Mail introuvable');

    }

}
