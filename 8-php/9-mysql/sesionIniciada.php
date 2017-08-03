<?php
    session_start();
    if (array_key_exists("id",$_COOKIE))
    {
        $_SESSION['id'] = $_SESSION['id'];
    }
    if (array_key_exists("id",$_SESSION))
    {
        echo "<p>Sesion iniciada. <a href='index.php? Logout=1'>Cerrar sesion</a></p>";
    }
    else
    {
        header("Location: index.php");
    }
?>