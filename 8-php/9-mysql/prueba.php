<?php
    session_start();
    $_SESSION['username']='joseluisnunez';
    echo "<p>Usuario con sesion iniciada".$_SESSION['username'];
?>