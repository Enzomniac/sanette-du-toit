<?php
get_header();
?>
    <main>

<?php 
    echo("Checking Local <br>");    
    if ('local.php') {
        echo("Hello Local");
    } else echo("Fail");
?>

    </main>

<?php
get_footer();
?>