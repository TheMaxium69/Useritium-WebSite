<?php

if (isset($_FILES['pictureProfilAdd']) && isset($_POST['idEdit'])){

    // Vérification si c'est une image
    $image_info = getimagesize($_FILES["pictureProfilAdd"]["tmp_name"]);
    if($image_info !== false) {
        // Vérification de la taille du fichier
        $max_file_size = 9 * 1024 * 1024; // 9 Mo
        if($_FILES["pictureProfilAdd"]["size"] <= $max_file_size) {

            // Dossier de destination
            $upload_dir = 'C:\Users\mxmto\Developpement\LocalHost\www\Useritium-WebSite\uploads\pp/';
            // Nouveau nom de fichier pour éviter les collisions
            $upload_file = $upload_dir . uniqid() . '_' . $_POST['idEdit'] . '.png';

            // Déplacer le fichier téléchargé vers le dossier de destination
            if(move_uploaded_file($_FILES["pictureProfilAdd"]["tmp_name"], $upload_file)) {

                // Enregistrement du nom de fichier dans la base de données
                $filename = basename($upload_file);
                $idEdit = $_POST['idEdit'];

                $maRequete = "UPDATE users SET pp='$filename' WHERE id='$idEdit'";
                $resultUpdate = mysqli_query($ConnectDB, $maRequete);

                if($resultUpdate){

                    $_SESSION["userPpLog"]= $filename;

                    resultPicture(1, "Enregistrement de votre photo de profile.");

                } else {

                    resultPicture(2, "BDD Erreur");
                }


            } else {
                resultPicture(2, "Une erreur s'est produite lors du déplacement du fichier vers le dossier de destination.");
            }

        } else {
            resultPicture(2,  "La taille du fichier dépasse la limite autorisée de 9 Mo.");
        }
    } else {
        resultPicture(2, "Le fichier téléchargé n'est pas une image valide.");
    }












}

function resultPicture($why, $msg){

    require "app/env.php";

    if ($why == 1){

        header("location: ". $env_connectUrl ."panel.php?p=2&true=" . $msg );

    }

    if ($why == 2){

        header("location: ". $env_connectUrl ."panel.php?p=2&err=" . $msg );
    }

}