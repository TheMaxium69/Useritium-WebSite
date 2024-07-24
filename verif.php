<?php include "app/app.php"; $page = 4; head($page); ?>
<body> <header id="connect-head"> <?php navbar($page, $isLogged); ?> </header>

<main>
<?php


$img = "404-page-not-found-62.png";
$titre = "Erreur de vérification";
$button = "Retour à l'accueil";
$buttonUrl = ".";

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

    if (!empty($_SESSION['userIdLog'])) {

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

            $img = "sending-emails-84.png";
            $titre = "Vous devez verifier votre mail";
            $button = "Envoyé un mail";
            $buttonUrl = ".";

        }

    }


}

?>

    <div style="width: 100%; text-align: center">
        <img src="assets/<?= $img ?>" style="
    pointer-events: none;width: 300px;transform: scale(1);
    margin-top: 9px;margin-bottom: 10px">
        <h3 class="title-morph"><?= $titre ?></h3>

        <div onclick="redirectPanel('<?= $buttonUrl ?>')" class="btn-morph" style="margin: 30px auto; "><?= $button ?></div>

    </div>


</main>

<style>

    .title-morph{
        margin-bottom: 46px;
        text-transform: uppercase;
        font-family: 'Montserrat', sans-serif;
        letter-spacing: -0.2px;
        font-weight: bold;
        /*color: #AAAEBB;*/
        /*color: #0c92ff;*/
        color: #1980d3;
        text-shadow: 1px 1px 1px #FFF;
        text-align: center;
    }

    .btn-morph {
        margin: 0 10px;
        max-width: 450px;
        border: 0;
        outline: 0;
        font-size: 16px;
        border-radius: 320px;
        padding: 16px;
        background-color: #EBECF0;
        text-shadow: 1px 1px 0 #FFF;
    }

    .btn-morph {
        color: #61677C;
        font-weight: bold;
        box-shadow: -5px -5px 20px #FFF, 5px 5px 20px #BABECC;
        cursor: pointer;
        font-weight: 600;
    }
    .btn-morph:hover {
        box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
    }
    
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

<script>
    function redirectPanel(i) {
        startUrl = "http://"
        startUrls = "https://"

        console.log(i)
        if (!i.startsWith(startUrl) || !i.startsWith(startUrls)) {
            window.location.href = i;
        } else {
            window.open(i, "_blank");
        }
    }
</script>


    <footer style="background-color: #193554">
        2024 © <a href="https://tyrolium.fr" target="_bank">TYROLIUM</a>
    </footer>

</body> </html>


