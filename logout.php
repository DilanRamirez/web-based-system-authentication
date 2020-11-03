<?php
   require("db-config.php");
   session_start();

   $time = date('Y-m-d')." ".date("h:i:sa");
   $username = $_SESSION["myusername"];

   $query = "UPDATE users SET lastlogin = '$time' WHERE username = '$username;";

   if (mysqli_query($conn, $query)) {
       echo "Time of last login added!";
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   
   mysqli_close($conn);
   if(session_destroy()) {
      header("Location: signin.php");
   }
?>