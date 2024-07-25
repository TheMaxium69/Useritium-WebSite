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

    $checkVerifIsGood = verifAndUpateEmail($email, $token);

    if ($checkVerifIsGood) {


        $img = "cybersecurity-1-98.png";
        $titre = "Votre mail à été vérifier ";
        $button = "Revenir sur le panel";
        $buttonUrl = 'panel.php?p=1';

    }




} else if (!empty($_GET['sending']) && !empty($_GET['email'])) {


    $email = $_GET['email'];
    $idUSer = $_SESSION['userIdLog'];

    $result = getOneEmailUser($email);

    if (!empty($result)) {

        $isGood = sendingMailVerif($email, $idUSer, $result['token']);

        if ($isGood){

            $img = "sending-emails-84.png";
            $titre = "Votre mail de vérification à été envoyé";
            $button = "Revenir sur le panel";
            $buttonUrl = 'panel.php?p=1';

        } else {

            $img = "404-page-not-found-62.png";
            $titre = "Erreur de l'envoie du mail de vérification";
            $button = "Revenir sur le panel";
            $buttonUrl = 'panel.php?p=1';

        }

    }

} else {

    if (!empty($_SESSION['userIdLog'])) {

        require "app/env.php";
        $yourMail = getEmailUser();

        $noMailVerif = 1;
        $yourDefaultMail = [];

        foreach ($yourMail as $mail){
            if ($mail['email'] == $_SESSION['userEmailLog']) {
                if ($mail['isVerif'] == 0) {
                    $noMailVerif = 2;
                    $yourDefaultMail = $mail;
                }
            }
        }


        if ($noMailVerif == 2) {

            $img = "sending-emails-84.png";
            $titre = "Vous devez verifier votre mail";
            $button = "Envoyé un mail";
            $buttonUrl = '?sending=yes&email=' . $yourDefaultMail['email'];

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


