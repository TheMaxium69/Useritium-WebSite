<?php include "app/app.php"; $page = 3; head($page); ?>
<body>
    
<?php

if($page == 3 && $isLogged == null){
    header("location: index.php");
}

if(empty($_GET['p'])){ 

    $sidepage = 404;

} else {

    $sidepage = $_GET['p'];

}

?>

<sidebar><?php sidebar($page); ?></sidebar>


            <main class="content">
            
            <?php 
            var_dump($_SESSION);
            var_dump($isLogged);
            
            content($sidepage) 
            
            ?>
                
            </main>

<script src='https://unpkg.com/@popperjs/core@2'></script><script  src="javascript/sidebar.js"></script>

<?php sidebarEnd(); ?>
</body> </html>