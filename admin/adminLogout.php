<?php
    session_start();
    unset($_SESSION['adminEmail']);
    header("Location:../login.php");
?>