<?php include "app/app.php"; $page = 2; head($page); ?>
<body> <header> <?php navbar($page); ?> </header>

<main>


    <?php

    var_dump($_SESSION);

    var_dump($isLogged);

    ?>

    <form action="" method="post"><button class="btn btn-success" name="modeDeco" value="on">Se déconnecter</button></form>

    <a class="btn btn-primary" href="home.php">Panel</a>


    <h3>Ah tu na pas de compte pas grave créer toi le ici</h3>
    <form method="post">
        <div class="form-group">
            <label for="username">Username Unique</label>
            <input type="text" class="form-control" name="usernameSignUp">
        </div>
        <div class="form-group">
            <label for="username">Name</label>
            <input type="text" class="form-control" name="displayNameSignUp">
        </div>
        <div class="form-group">
            <label for="username">Email</label>
            <input type="email" class="form-control" name="emailSignUp">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="passwordSignUp">
        </div>
        <div class="form-group">
            <label for="passwordRetype">Re-type Password</label>
            <input type="password" class="form-control" name="passwordRetypeSignUp">
        </div>
        <div class="form-group">
            <input type="hidden" name="modeInscription" value="on">
            <input type="submit" value="Sign up" class="btn btn btn-outline-danger">
        </div>
    </form>


    <h1>tu veut te connecté ?</h1>

    <form method="POST">
        <div class="form-group">
            <label for="username">Username</label>

            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">password</label>

            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Log in" class="btn btn-outline-danger">
        </div>
    </form>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='https://unpkg.com/izitoast/dist/js/iziToast.min.js'></script>
    <script  src="https://tyrolium.fr/javascript/notif.js"></script>


    <?php if (!empty($_GET['err'])) { ?>
        <script>
            if(Text != 1){
                iziToast.error({
                    title: 'Erreur',
                    position: 'bottomRight',
                    message: ' Code : <?php echo $_GET['err']; ?>'
                });
            }
        </script>
    <?php } ?>

    <?php if (!empty($_GET['true'])) {?>
        <script>
            if(Text != 1){
                iziToast.success({
                    title: 'OK',
                    position: 'bottomRight',
                    message: 'Code : <?php echo $_GET['true']; ?>'
                });
            }
        </script>
    <?php } ?>




</main>

</body> </html>