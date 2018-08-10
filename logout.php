<?php
    session_start();

   session_destroy();
   $_SESSION = [];
   if(session_destroy()) {
      header("Location: index.php");
   }
   header("Location: index.php");
?>

<!-- if(!isset($_SESSION['login_user'])){
   header("location:login.php");
} -->
