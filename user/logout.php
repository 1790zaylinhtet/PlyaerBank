<?php
    session_start();
    unset($_SESSION['userEmail']);
    header("Location:homePage.php");
?>