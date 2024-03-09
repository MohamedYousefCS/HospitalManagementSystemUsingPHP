<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['Email']);
    session_destroy();

    header("Location: pat_logout.php");
    exit;
?>