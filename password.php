<?php include "app/app.php"; $page = 5; head($page); ?>
<body> <header id="connect-head"> <?php navbar($page, $isLogged); ?> </header>

<main>

<?php


$img = "404-page-not-found-62.png";
$titre = "Erreur";
$button = "Retour à l'accueil";
$buttonUrl = ".";

if (!empty($_GET['change'])){

    $img = "cybersecurity-1-98.png";
    $titre = "Changement de mots de passe effectuez";
    $button = "Retour à l'accueil";
    $buttonUrl = ".";

    ?>

    <div style="width: 100%; text-align: center">
        <img src="assets/<?= $img ?>" style="
    pointer-events: none;width: 300px;transform: scale(1);
    margin-top: 9px;margin-bottom: 10px">
        <h3 class="title-morph"><?= $titre ?></h3>

        <div onclick="redirectPanel('<?= $buttonUrl ?>')" class="btn-morph" style="margin: 30px auto; "><?= $button ?></div>

    </div>

    <?php

} else if (!empty($_GET['token'])){

    $token = $_GET['token'];

    $isVerif = verifTicketPassword($token);



    if ($isVerif){

        $img = "astronaut-52.png";
        $titre = "Entrez votre nouveau mots de passe";
        $button = "Changer votre mot de passe";

        ?>

        <div style="width: 100%; text-align: center">
            <img src="assets/<?= $img ?>" style="
    pointer-events: none;width: 300px;transform: scale(1);
    margin-top: 9px;margin-bottom: 10px">
            <h3 class="title-morph" style="  margin-bottom: 33px;"><?= $titre ?></h3>
            <form method="POST">
                <input class="input-morph" type="password" name="passForgetNew" placeholder="Votre nouveau mots de passe" style="margin-bottom: 10px"><br>
                <input class="input-morph" type="password" name="passForgetNewC" placeholder="Confirmer votre mots de passe"><br>
                <input type="hidden" name="passForgetToken" value="<?= $token ?>">
                <input value="<?= $button ?>" type="submit" class="btn-morph" style="padding: 16px 25px;margin: 30px auto; ">
            </form>
        </div>



<?php

    } else {

        $img = "404-page-not-found-62.png";
        $titre = "Erreur";
        $button = "Retour à l'accueil";
        $buttonUrl = ".";

        ?>


        <div style="width: 100%; text-align: center">
            <img src="assets/<?= $img ?>" style="
    pointer-events: none;width: 300px;transform: scale(1);
    margin-top: 9px;margin-bottom: 10px">
            <h3 class="title-morph"><?= $titre ?></h3>

            <div onclick="redirectPanel('<?= $buttonUrl ?>')" class="btn-morph" style="margin: 30px auto; "><?= $button ?></div>

        </div>





        <?php
    }
} else if (!empty($_GET['create'])){

    $img = "astronaut-52.png";
    $titre = "Entrez votre pseudo";
    $button = "Mots de passe oublié"

        ?>

    <div style="width: 100%; text-align: center">
        <img src="assets/<?= $img ?>" style="
    pointer-events: none;width: 300px;transform: scale(1);
    margin-top: 9px;margin-bottom: 10px">
        <h3 class="title-morph" style="  margin-bottom: 33px;"><?= $titre ?></h3>
        <form>
            <input class="input-morph" type="text" name="pseudo" placeholder="Votre pseudo"><br>
            <input value="<?= $button ?>" type="submit" class="btn-morph" style="padding: 16px 25px;margin: 30px auto; ">
        </form>
    </div>


        <?php



} else if (!empty($_GET['pseudo'])) {



    $users = getEmailByPseudo($_GET['pseudo']);


    if (!empty($users)) {


        $email = $users['email'];
        $maskedEmail = substr($email, 0, 2) . str_repeat('*', strlen($email) - 6) . substr($email, -4);

        $img = "sending-emails-84.png";
        $titre = "Envoyé un mail à " . $maskedEmail;
        $button = "Envoyé un mail";
        $buttonUrl = "password.php?sending=" . $_GET['pseudo'];

    ?>

    <div style="width: 100%; text-align: center">
        <img src="assets/<?= $img ?>" style="
    pointer-events: none;width: 300px;transform: scale(1);
    margin-top: 9px;margin-bottom: 10px">
        <h3 class="title-morph" style="  margin-bottom: 12px;"><?= $titre ?></h3>
         <input onclick="redirectPanel('<?= $buttonUrl ?>')" value="<?= $button ?>" type="submit" class="btn-morph" style="padding: 16px 25px;margin: 30px auto; ">
    </div>


    <?php

    } else {

    ?>


        <div style="width: 100%; text-align: center">
            <img src="assets/<?= $img ?>" style="
    pointer-events: none;width: 300px;transform: scale(1);
    margin-top: 9px;margin-bottom: 10px">
            <h3 class="title-morph"><?= $titre ?></h3>

            <div onclick="redirectPanel('<?= $buttonUrl ?>')" class="btn-morph" style="margin: 30px auto; "><?= $button ?></div>

        </div>


    <?php }
} else if (!empty($_GET['sending'])) {


    $users = getEmailByPseudo($_GET['sending']);


    if (!empty($users)) {

        $mailIsGood = sendingMailPassword($users);

        if ($mailIsGood){

            $img = "sending-emails-84.png";
            $titre = "Mail envoyé";
            $button = "Revenir à la connexion";
            $buttonUrl = "connect.php";

        } else {

            $img = "404-page-not-found-62.png";
            $titre = "Erreur d'envoie de Mail";
            $button = "Revenir à la connexion";
            $buttonUrl = "connect.php";

        }

    ?>

        <div style="width: 100%; text-align: center">
            <img src="assets/<?= $img ?>" style="
        pointer-events: none;width: 300px;transform: scale(1);
        margin-top: 9px;margin-bottom: 10px">
            <h3 class="title-morph"><?= $titre ?><br>
                <?php if ($titre == "Mail envoyé"){ ?><small style="color: black">Lien valade 2H</small></h3><?php } ?>

            <div onclick="redirectPanel('<?= $buttonUrl ?>')" class="btn-morph" style="margin: 30px auto; "><?= $button ?></div>

        </div>

        <?php

    } else {

        ?>

        <div style="width: 100%; text-align: center">
            <img src="assets/<?= $img ?>" style="
    pointer-events: none;width: 300px;transform: scale(1);
    margin-top: 9px;margin-bottom: 10px">
            <h3 class="title-morph"><?= $titre ?></h3>

            <div onclick="redirectPanel('<?= $buttonUrl ?>')" class="btn-morph" style="margin: 30px auto; "><?= $button ?></div>

        </div>

    <?php }
} else { ?>

    <div style="width: 100%; text-align: center">
        <img src="assets/<?= $img ?>" style="
    pointer-events: none;width: 300px;transform: scale(1);
    margin-top: 9px;margin-bottom: 10px">
        <h3 class="title-morph"><?= $titre ?></h3>

        <div onclick="redirectPanel('<?= $buttonUrl ?>')" class="btn-morph" style="margin: 30px auto; "><?= $button ?></div>

    </div>

<?php } ?>

</main>

<style>

    .input-morph{
        width: 90%;
        max-width: 430px;
        margin-right: 8px;
        box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
        /*width: 100%;*/
        box-sizing: border-box;
        transition: all 0.2s ease-in-out;
        border: 0;
        outline: 0;
        font-size: 16px;
        border-radius: 20px;
        padding: 16px;
        background-color: white;
        text-shadow: 1px 1px 0 #FFF;
        font-family: 'Montserrat', sans-serif;
        letter-spacing: -0.2px;
    }
    .input-morph:focus {
        box-shadow: inset 1px 1px 2px #BABECC, inset -1px -1px 2px #FFF;
    }

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

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://unpkg.com/izitoast/dist/js/iziToast.min.js'></script>
<script  src="https://tyrolium.fr/javascript/notif.js"></script>


<?php if (!empty($_GET['err'])) { ?>
    <script>
        if(Text != 1){
            iziToast.error({
                title: 'Erreur',
                position: 'bottomCenter',
                message: ' <?php echo $_GET['err']; ?>'
            });
        }
    </script>
<?php } ?>


<footer style="background-color: #193554">
    2024 © <a href="https://tyrolium.fr" target="_bank">TYROLIUM</a>
</footer>

</body> </html>
