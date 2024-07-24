<?php include "app/app.php"; $page = 4; head($page); ?>
<body> <header id="connect-head"> <?php navbar($page, $isLogged); ?> </header>

<main style="height: ">
<?php

if (!empty($_GET['token']) && !empty($_GET['email'])) {

    $token = $_GET['token'];
    $email = $_GET['email'];





    var_dump($token);
    var_dump($email);




/*

$to = $user_email;
$subject = "Vérification de l'email";
$token = uniqid();
$link = "http://yourwebsite.com/verify.php?token=$token";

$message = "
    Merci de vous être inscrit !
    S'il vous plaît, cliquez sur le lien ci-dessous pour vérifier votre adresse e-mail :
    $link
    ";

$headers = "From: no-reply@yourwebsite.com\r\n";
$headers .= "Content-type: text/html\r\n";

mail($to, $subject, $message, $headers);

// N'oubliez pas de stocker le jeton dans la base de données !

*/


} else {

    require "app/env.php";
    $yourMail = getEmailUser();

    $noMailVerif = 1;

    foreach ($yourMail as $mail){
        if ($mail['email'] == $_SESSION['userEmailLog']) {
            if ($mail['isVerif'] == 0) {
                $noMailVerif = 2;
            }
        }
    }


    if ($noMailVerif == 2) {


        echo "IL FAUT QUE TU VERIF MAIL";

    } else {


        echo "PK TU EST Là";




    }


}

?>

</main>

<style>
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
    }

    main {
        flex-grow: 1;
        overflow: auto;
    }

    header#connect-head {
        box-shadow: 0px 10px 10px #d1d9e6, -10px -10px 10px #f9f9f9;
    }

</style>


    <footer style="background-color: #193554">
        2024 © <a href="https://tyrolium.fr" target="_bank">TYROLIUM</a>
    </footer>

</body> </html>


