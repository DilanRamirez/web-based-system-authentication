<?php
   require("db-config.php");
   session_start();

    if(session_destroy()) {
        header("Location: signin.php");
    }
    
?>

<!-- 08:13:33pm -->