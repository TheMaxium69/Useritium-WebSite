<?php include "app/app.php"; $page = 1; head($page); ?>
<body> <header> <?php navbar($page, $isLogged); ?> </header>

<main>
    
    <section id="devise" class="container my-5">
        <div class="row align-items-center">
            <img class="col-6" src="assets/Information flow_Monochromatic.png" alt="Lorem Ispu">
            <article class="col-5 text-center">
                <h2 class="text-uppercase text-center fw-bold">A propos des comptes Useritium</h2>
                Les comptes Useritium sont proposés par Tyrolium, afin de vous proposer une adresse mail spécialisée et personnelle.
                <br><br>
                Ces comptes vous offrent un cloud et des fonctionnalités pour la création de documents ou de notes, de plus, ils permettent egalement de pouvoir gérer vos jeux vidéos ou vos serveurs personnels et/ou professionnels.
                <br><br>
                Ils vous permettent également de connaître l'avancée de vos demandes de prestations.
                <br><br>
                Ces comptes sont aussi une garantie de sécurité de vos données, nous nous engageons à ne jamais partager ou divulguer quelconques informations vous concernant ou liées à ces comptes (projet open source).
            </article>
        </div>  
    </section>
    <section id="fabrication">
        <div class="container">
            <h2>Fonctionnalités</h2>
            <ul>
                <li class="col align-self-center">
                    <img src="assets/World wide web_Monochromatic.png" alt="Lorem Ispu">
                    <h3>Synchronisation avec tous vos Sites</h3>
                    <p>Synchronisez les comptes Useritium avec tous nos sites et les sites de nos partenaires, cela permet d'avoir un seul compte et un seul mot de passe afin de simplifier toutes vos connexions et vos créations de comptes.

Vous pourrez consulter tous les sites ou vous êtes connectés sur le pannel Cette synchronisation permet aussi de voir toutes vos informations sur le site de Useritium </p>
                </li>
                <li class="col align-self-center">
                    <img src="assets/Sending emails_Monochromatic.png" alt="Lorem Ispu">
                    <h3>Votre boîte Mail</h3>
                    <p>La boîte mail de Useritium à énormément d'avantages. Elle chiffre vos données et vos informations personnelles, elle est facile d'utilisation, elle est également très intuitive et pratique.

Votre mail sera personnalisé, avec des adresses mail comme

exemple@useritium.fr ou exemple@tyromail.fr

Nous nous engageons enfin, à ne jamais vendre ou divulguer vos données et informations personnelles. </p>
                </li>
                <li class="col align-self-center">
                    <img src="assets/Data storage_Monochromatic.png" alt="Lorem Ispu">
                    <h3>Votre Cloud personnel</h3>
                    <p>Le cloud offert avec le compte Useritium permet de synchroniser toutes vos images, tous vos documents, vos fichiers que vous pourrez retrouver sur tous vos appareils.

Ce cloud est chiffré et protégé et aucune information personnelle ne sera divulguée à des fins commerciales. </p>
                </li>
                <li class="col align-self-center">
                    <img src="assets/Files And Folder_Monochromatic.png" alt="Lorem Ispu">
                    <h3>Créez vos Documents et vos Notes</h3>
                    <p>Les comptes Useritium permettent de créer des notes et tout autre type de documents (tableurs, présentations...).

Toutes ces notes et ces documents seront également synchronisés sur tous vos appareils. </p>
                </li>
                <li class="col align-self-center">
                    <img src="assets/Consulting_Monochromatic.png" alt="Lorem Ispu">
                    <h3>Panel de Prestations</h3>
                    <p>Tyrolium produit des prestations de sites web, graphisme, musiques... Nos clients pourront retrouver l'avancée en temps réel de leurs prestations ainsi que toute information complémentaire afin de simplifier la prise de contact.

En effet, nous voulons être proches de nos clients, ils pourront alors également nous contacter pour des questions, des modifications ou toute autre demande concernant leurs prestations en cours. </p>
                </li>
                <li class="col align-self-center">
                    <img src="assets/Gaming _Monochromatic.png" alt="Lorem Ispu">
                    <h3>Retrouvez vos Jeux Vidéo</h3>
                    <p>Vous retrouverez ici tous les jeux vidéos que vous possédez, dont ceux de TyroServ et TyroStudio ainsi que ceux de nos futurs partenaires.

Vos sauvegardes y seront stockées

Ainsi vous pourrez également ajouter vos amis et consulter leur profil </p>
                </li>
                <li class="col align-self-center">
                    <img src="assets/Data Hosting_Monochromatic.png" alt="Lorem Ispu">
                    <h3>Gérez tous vos Serveurs</h3>
                    <p>Vous pourrez retrouver dans cette section, tous vos comptes achetés par notre filiale SolidServ.

Dans ce pannel il vous sera possible de faire toute la gestion de vos serveurs, gérer les accès de vos différents utilisateurs, et accéder à vos bases de données ainsi, que tout synchroniser grâce aux comptes Useritium. </p>
                </li>
            </ul>
        </div>
    </section>
    <section id="items" class="container">
        <h2>Nos Engagements</h2>
        <ul>
            <li class="col align-self-center">
                <i class="ri-emotion-happy-line"></i>
                <p>A fournir un travail et un relationnel de qualité.<br>
La gestion de nos serveurs et nos infrastructures sont 100% éco responsables.</p>
            </li>
            <li class="col align-self-center">
            <i class="ri-shield-keyhole-line"></i>
                <p>Vos données et informations personnelles sont cryptées. Vos données et informations personnelles ne seront jamais divulguées ou vendues pour quelque raison que ce soit.
Tous nos codes et applications sont open source</p>
            </li>
            <li class="col align-self-center">
                <i class="ri-flag-line"></i>
                <p> L'objectif de Tyrolium et des comptes Useritium est de concurrencer le monde et les géants de notre domaine en restant français.
                <br>
Fait en France, par des français.</p>
            </li>
        </ul>
    </section>

</main>


    <footer>
        2022 © <a href="https://tyrolium.fr" target="_bank">TYROLIUM</a>
    </footer>


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
                    title: 'Connectée',
                    position: 'bottomRight',
                    message: 'Connexion a votre compte avec success'
                });
            }
        </script>
    <?php } ?>

</body> </html>