<?php


if (isset($_FILES['pictureSkinAdd']) && isset($_POST['idEdit'])) {

    // Vérification si c'est une image
    $image_info = getimagesize($_FILES["pictureSkinAdd"]["tmp_name"]);
    if ($image_info !== false) {
        $width = $image_info[0]; // Largeur de l'image
        $height = $image_info[1]; // Hauteur de l'image

        // Vérification de la taille du fichier
        if($width == 64 && $height == 64) {

            // Vérification de la taille du fichier
            $max_file_size = 9 * 1024 * 1024; // 9 Mo
            if ($_FILES["pictureSkinAdd"]["size"] <= $max_file_size) {

                // Dossier de destination
                $upload_dir = 'C:\Users\mxmto\Developpement\LocalHost\www\Useritium-WebSite\uploads\skin/';
                // Nouveau nom de fichier pour éviter les collisions
                $upload_file = $upload_dir . uniqid() . '_' . $_POST['idEdit'] . '.png';

                // Déplacer le fichier téléchargé vers le dossier de destination
                if (move_uploaded_file($_FILES["pictureSkinAdd"]["tmp_name"], $upload_file)) {

                    // Enregistrement du nom de fichier dans la base de données
                    $filename = basename($upload_file);
                    $idEdit = $_POST['idEdit'];

                    $maRequete = "UPDATE users_tyroserv SET skin='$filename' WHERE idUsers='$idEdit'";
                    $resultUpdate = mysqli_query($ConnectDB, $maRequete);

                    if ($resultUpdate) {

                        resultSkin(1, "Enregistrement de votre skin minecraft.");

                    } else {

                        resultSkin(2, "BDD Erreur");
                    }

                } else {
                    resultSkin(2, "Une erreur s'est produite lors du déplacement du fichier vers le dossier de destination.");
                }

            } else {
                resultSkin(2, "La taille du fichier dépasse la limite autorisée de 9 Mo.");
            }
        } else {
            resultSkin(2, "Un skin doit faire 64x64");
        }
    } else {
        resultSkin(2, "Le fichier téléchargé n'est pas une image valide.");
    }


}

function resultSkin($why, $msg)
{

    require "app/env.php";

    if ($why == 1) {

        header("location: " . $env_connectUrl . "panel.php?p=10&true=" . $msg);

    }

    if ($why == 2) {

        header("location: " . $env_connectUrl . "panel.php?p=10&err=" . $msg);
    }

}