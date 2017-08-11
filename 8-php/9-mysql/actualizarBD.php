<?php
    session_start();
    if (array_key_exists("content",$_POST))
    {
        include "conecction.php";
        $query ="UPDATE usuarios SET diario='".mysqli_real_escape_string($link,$_POST['content'])."'
        WHERE id=".mysqli_real_escape_string($link,$_SESSION['id'])." LIMIT 1";
        $some = mysqli_query($link,$query);

        echo '<pre>';
        var_dump( $query, $some);

    }

?>