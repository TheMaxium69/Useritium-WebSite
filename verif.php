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
</style>


    <footer>
        2024 © <a href="https://tyrolium.fr" target="_bank">TYROLIUM</a>
    </footer>

</body> </html>


