<?php
    session_start();
    session_unset($_SESSION['prenom']);
    session_destroy();
    header('location: login.html');
?>