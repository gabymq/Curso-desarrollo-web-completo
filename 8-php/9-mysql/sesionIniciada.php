<?php
    session_start();
    $contenidoDiario="";
    if (array_key_exists("id",$_COOKIE)&& $_COOKIE['id'])
    {
        $_SESSION['id'] = $_COOKIE['id'];
    }
    if (array_key_exists("id",$_SESSION))
    {
        include "conecction.php";
        $query = "SELECT diario FROM usuarios WHERE id='".mysqli_real_escape_string($link,$_SESSION['id'])."' LIMIT 1";
        $result=mysqli_real_escape_string($link,$query);
        $result=mysqli_query($link,$query);

        $fila=mysqli_fetch_array($result);
        $contenidoDiario= $fila['diario'];
    }
    else
    {
        header("Location: index.php");
    }
    include"header.php";
?>


    <nav class="navbar navbar-ligth bg-faded navbar-fixed-top">

        <a class="navbar-brand" href="#">Diario Seceto</a>

     <div class="pull-xs-right">
      <a href="index.php?Logout=1">
      <button class="btn btn-outline-success" type="submit">Cerrar Sesion</button></a>

    </div>
    </nav>
    <div class="container-fluid" id="contenedorSesionIniciada">
    <textarea id="diario" class="form-control">
    
    <?php $contenidoDiario; ?></textarea>

    </div>

<?php include"footer.php"; ?>