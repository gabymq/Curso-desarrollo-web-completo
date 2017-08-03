<?php
    session_start();
    if ($_SESSION['username'])
    {
        echo "<p>Has iniciado sesion como "
    .$_SESSION['username']."</p>";  
    }
    else
    {
        header("Location: index.php");
    }

?>