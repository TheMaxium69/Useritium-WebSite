<?php include "app/app.php"; $page = 1; head($page); ?>
<body> <header> <?php navbar($page, $isLogged); ?> </header>

<main>
    
    <section id="devise" class="container my-5">
        <div class="row align-items-center">
            <img class="col-6" src="assets/Information flow_Monochromatic.png" alt="Lorem Ispu">
            <article class="col-5 text-center">
                <h2 class="text-uppercase text-center fw-bold">À propos des comptes Useritium</h2>

                Les comptes Useritium sont proposés par Tyrolium, afin de vous proposer une adresse mail spécialisée et personnelle.

                <br><br>

                Ces comptes vous offrent un cloud et des fonctionnalités pour la création de documents ou de notes. De plus, ils permettent également de pouvoir gérer vos jeux vidéos ou vos serveurs personnels et/ou professionnels.

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
                    <img src="assets/World wide web_Monochromatic.png" alt="Lorem Ispu"><h3>Synchronisation avec tous vos sites</h3>

                    <p>Synchronisez vos comptes Useritium avec tous nos sites et ceux de nos partenaires, ce qui vous permettra d'avoir un seul compte et un seul mot de passe pour simplifier vos connexions et la création de nouveaux comptes.</p>

                    <p>Vous pourrez consulter tous les sites sur lesquels vous êtes connecté via le panneau de gestion. Cette synchronisation permet également de visualiser toutes vos informations sur le site Useritium.</p>
                </li>
                <li class="col align-self-center">
                    <img src="assets/Sending emails_Monochromatic.png" alt="Lorem Ispu">
                    <h3>Votre boîte mail</h3>

                    <p>La boîte mail Useritium offre de nombreux avantages. Elle chiffre vos données et informations personnelles, est facile à utiliser, intuitive et pratique.</p>

                    <p>Votre adresse mail sera personnalisée, avec des exemples tels que :</p>

                    <ul>
                        <li style="margin: 5px auto;">exemple@useritium.fr</li>
                        <li style="margin: 5px auto;">exemple@tyromail.fr</li>
                    </ul>

                    <p>Enfin, nous nous engageons à ne jamais vendre ou divulguer vos données et informations personnelles.</p>
                </li>
                <li class="col align-self-center">
                    <img src="assets/Data storage_Monochromatic.png" alt="Lorem Ispu">
                    <h3>Votre cloud personnel</h3>
                    <p>Le cloud offert avec le compte Useritium permet de synchroniser toutes vos images, tous vos documents et tous vos fichiers, que vous pourrez retrouver sur tous vos appareils.

                        Ce cloud est chiffré et protégé, et aucune information personnelle ne sera divulguée à des fins commerciales.</p>
                </li>
                <li class="col align-self-center">
                    <img src="assets/Files And Folder_Monochromatic.png" alt="Lorem Ispu">
                    <h3>Créez vos documents et vos notes</h3>
                    <p>Les comptes Useritium permettent de créer des notes et tout autre type de documents (tableaux, présentations...).

                        Toutes ces notes et ces documents seront également synchronisés sur tous vos appareils.</p>
                </li>
                <li class="col align-self-center">
                    <img src="assets/Consulting_Monochromatic.png" alt="Lorem Ispu">
                    <h3>Panel de prestations</h3>
                    <p>Tyrolium propose des prestations de création de sites web, de graphisme, de musique, etc. Nos clients peuvent suivre l'avancement en temps réel de leurs projets, et trouver toutes les informations complémentaires nécessaires pour faciliter la communication.

                        Nous souhaitons entretenir une relation de proximité avec nos clients, qui peuvent ainsi nous contacter facilement pour toute question, modification ou demande concernant leurs projets en cours.</p>
                </li>
                <li class="col align-self-center">
                    <img src="assets/Gaming _Monochromatic.png" alt="Lorem Ispu">
                    <h3>Retrouvez vos jeux vidéo</h3>
                    <p>Vous retrouverez ici tous les jeux vidéo que vous possédez, y compris ceux de TyroServ et TyroStudio, ainsi que ceux de nos futurs partenaires.

                        Vos sauvegardes y seront stockées.

                        Vous pourrez également ajouter vos amis et consulter leurs profils.</p>
                </li>
                <li class="col align-self-center">
                    <img src="assets/Data Hosting_Monochromatic.png" alt="Lorem Ispu">
                    <h3>Gérez tous vos serveurs</h3>
                    <p>Vous retrouverez dans cette section tous vos comptes achetés auprès de notre filiale SolidServ.

                        Ce panneau vous permet de gérer entièrement vos serveurs, les accès de vos différents utilisateurs et vos bases de données. Vous pouvez également tout synchroniser grâce aux comptes Useritium.</p>
                </li>
            </ul>
        </div>
    </section>
    <section id="items" class="container">
        <h2>Nos Engagements</h2>
        <ul>
            <li class="col align-self-center">
                <i class="ri-emotion-happy-line"></i>
                <p>Fournir un travail et un relationnel de qualité.<br>
                    La gestion de nos serveurs et de nos infrastructures est 100% écoresponsable.</p>
            </li>
            <li class="col align-self-center">
                <i class="ri-shield-keyhole-line"></i>
                <p>Vos données et informations personnelles sont chiffrées. Vos données et informations personnelles ne seront jamais divulguées ou vendues, pour quelque raison que ce soit.
                    Tous nos codes et applications sont open source.</p>
            </li>
            <li class="col align-self-center">
                <i class="ri-flag-line"></i>
                <p>L'objectif de Tyrolium et des comptes Useritium est de concurrencer les géants de notre domaine à l'échelle mondiale, tout en restant une entreprise française.
                    <br>
                    Fait en France, par des Français.</p>
            </li>
        </ul>
    </section>

</main>


    <footer>
        <a href="terms.php" style="text-decoration: underline">Mentions Légals</a><br>
        <?= date("Y") ?> © <a href="https://tyrolium.fr" target="_bank">TYROLIUM</a>
    </footer>

</body> </html>