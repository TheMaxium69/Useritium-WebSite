<?php include "app/app.php"; $page = 3; head($page); ?>
<body>
<?php

if($page == 3 && $isLogged == null){
    header("location: index.php");
}

?>

<sidebar><?php sidebar($page); ?></sidebar>


<!--
    <form action="" method="post"><button class="btn btn-outline-red" name="modeDeco" value="on">Se déconnecter</button></form>
-->

            <main class="content">

                <section>

                    <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h2>

                </section>
                <section>

                    <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h2>

                </section>
                <section>

                    <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h2>

                </section>

                <section>

                    <h2>
                    <?php

                        var_dump($_SESSION);
                        var_dump($isLogged);
                        
                    ?>


                    </h2>

                </section>

                <style>

                    section{
                        margin-bottom: 100px;
                    }

                </style>
            </main>

<script src='https://unpkg.com/@popperjs/core@2'></script><script  src="javascript/sidebar.js"></script>

<?php sidebarEnd(); ?>
</body> </html>