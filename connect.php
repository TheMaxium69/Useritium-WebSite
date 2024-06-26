<?php include "app/app.php"; $page = 2; head($page);?>
<body>
<?php if(!$appdesktop){?><header id="connect-head"> <?php navbar($page, $isLogged); ?> </header><?php } else { ?>
<style>#particule-acc { height: 101% }</style>
<?php
if ($isLogged) {
    header("location: panel.php");
}
} ?>

<main id="main-contact">
    <div id="particule-acc">
        <section id="account">
            <div class="section">
                <div class="container">
                    <div class="justify-content-center">
                        <div class="col-12 text-center align-self-center py-5">
                            <div class="section pb-5 pt-5 pt-sm-2 text-center">
                                <h6 class="mb-0 pb-3"><span>Connexion</span><span>S'inscrire</span></h6>
                                <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                                <label for="reg-log"></label>
                                <div class="card-3d-wrap mx-auto">
                                    <div class="card-3d-wrapper">
                                            <div class="card-front">
                                                <form method="post" class="center-wrap">
                                                    <div class="section text-center">
                                                        <h4 class="mb-4 pb-3">Connexion</h4>
                                                        <div class="form-group">
                                                            <input type="text" name="username" class="form-style" placeholder="Votre Username" id="logeusermane" autocomplete="off">
                                                            <i class="input-icon uil uil-at"></i>
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <input type="password" name="password" class="form-style" placeholder="Votre Mot De Passe" id="logpass" autocomplete="off">
                                                            <i class="input-icon uil uil-lock-alt"></i>
                                                        </div>
                                                        <input type="hidden" name="site" value="<?= $env_connectUrl ?>">
                                                        <input class="btn mt-4" type="submit" value="Envoyer"></input>
                                                        <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Mot de passe oublié?</a></p>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-back">
                                                <form method="post" class="center-wrap">
                                                    <div class="section text-center">
                                                        <h4 class="mb-4 pb-3">S'inscrire</h4>
                                                        <div class="form-group">
                                                            <input type="text" name="usernameSignUp" class="form-style" placeholder="Ton Pseudo" id="logname" autocomplete="off">
                                                            <i class="input-icon uil uil-user"></i>
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <input type="email" name="emailSignUp" class="form-style" placeholder="Ton Email" id="logemail" autocomplete="off">
                                                            <i class="input-icon uil uil-at"></i>
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <input type="password" name="passwordSignUp" class="form-style" placeholder="Ton Mot De Passe" id="logpass" autocomplete="off">
                                                            <i class="input-icon uil uil-lock-alt"></i>
                                                        </div>
                                                        
                                                        <input type="hidden" name="site" value="<?= $env_connectUrl ?>">
                                                        <input class="btn mt-4" type="submit" value="Envoyer"></input>
                                                    </div>
                                                </form>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- back -->
    </div>
</main>

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

    <?php if (!empty($_GET['true'])) {?>
        <script>
            if(Text != 1){
                iziToast.success({
                    title: 'Succès',
                    position: 'bottomCenter',
                    message: '<?php echo $_GET['true']; ?>'
                });
            }
        </script>
    <?php } ?>

</body> </html>