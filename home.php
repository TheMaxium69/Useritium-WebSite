<?php include "app/app.php"; $page = 2; head($page); ?>
<body> <header> <?php navbar($page); ?> </header>

<?php

if($page == 2 && $isLogged == null){
    header("location: index.php");
}

?>
<main>


    <?php

    var_dump($_SESSION);

    var_dump($isLogged);

    ?>





    <form action="" method="post"><button class="btn btn-outline-red" name="modeDeco" value="on">Se déconnecter</button></form>



</main>


</body> </html>