<?php
    session_start();
    $error="";
    if (array_key_exists("Logout",$_GET))
    {
        // Viene de la pagina sesion iniciada
        session_unset();
        setcookie("id","",time()-60*60);
        $_COOKIE["id"]="";

    }
    elseif((array_key_exists("id",$_SESSION) AND $_SESSION['id']) OR (array_key_exists("id",$_COOKIE) AND $_COOKIE['id']))
    {
        header ("Location: sesionIniciada.php");
    }
    if (array_key_exists("submit",$_POST))
    {
        include"conecction.php";
        if (!$_POST['email'])
        {
            $error .= "<br>Email requerido";
        }
         if (!$_POST['password'])
        {
            $error .= "<br>Password requerido";
        }
        if ($error!="")
        {
            $error="<p>Hubo algun(os) error(es) en el formulario: ".$error."</p";
        }
        else
        {
            if ($_POST['registro']=='1')
            {

            
                $query ="SELECT email FROM usuarios WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";
                $result = mysqli_query($link,$query);

                if (mysqli_num_rows($result)>0)
                {
                    $error="Email ya registrado";
                }
                else
                {
                    $query ="INSERT INTO usuarios(email,password)
                    VALUES('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";
                    if (!mysqli_query($link,$query))
                    {
                        $error="<p>No hemos podido completar en registro, porfavor intente mas tarde</p>";
                    }
                    else
                    {
                        //  Actiualizar el almacenamiento del password
                        $query="UPDATE usuarios SET password='".md5(md5(mysqli_insert_id($link)).$_POST['password'])."'WHERE id=".mysqli_insert_id($link)." LIMIT 1";
                        mysqli_query($link,$query);
                        $_SESSION['id']=mysqli_insert_id($link);
                        if ($_POST['permanecerIniciada']=='1')
                        {
                            setcookie("id",mysqli_insert_id($link),time()+60*60*24*365);
                        }
                        header("Location: sesionIniciada.php");
                    }
                }
            }
            else
            {
                // Comprobamos el inicio de sesion
                $query="SELECT * FROM usuarios WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."'";
                $result=mysqli_query($link,$query);
                $fila=mysqli_fetch_array($result);
                if (isset($fila))
                {
                    $passwordHasheada=md5(md5($fila['id']).$_POST['password']);
                    if ($passwordHasheada==$fila['password'])
                    {
                        // Usuario autenticado
                        $_SESSION['id']=$fila['id'];
                        if ($_POST['permanecerInciada']=='1')
                        {
                           setcookie("id",$fila['id'],time()+60*60*24*365); 
                        }
                        header("Location: sesionIniciada.php");
                    }
                    else
                    {
                        $error="El email/password no pudo ser encontrado!";
                    }
                    
                }
                 else
                {
                    $error="El email/password no pudo ser encontrado!";
                 }
            }
        }
    
    }
?>
<?php include"header.php"; ?>

    <div class="container">
    <h1>Diario Secreto</h1>
    <p><strong>Guarda tus pensamientos para siempre<strong></p>

    <div id="error">
        <?php
        if ($error!="")
            {
                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
            }
        ?>
  
    </div>


    <form method="POST" id="formularioRegistro">
    <p>Estas interesad@ Registrate!!!</p>
        <fieldset class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Tu email">
        </fieldset>
        <fieldset class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password">
        </fieldset>
        <div class="checkbox">
        <label>
            <input  type="checkbox" name="permanecerIniciada" value=1>Permanecer Iniciada
        </label>
        </div>

        <fieldset class="form-group">
            <input  type="hidden" name="registro" value=1>
            <input  class="btn btn-success" type="submit" name="submit" value="Registrate">
        </fieldset> 
        <p><a class="alternarFormularios">Iniciar sesion</a></p>
    </form>

    <form method="POST" id="formularioLogin">
        <p>Inicia sesion con usuario/password</p>
        <fieldset class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Tu email">
        </fieldset> 
        <fieldset class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password">
        </fieldset> 
        <fieldset class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="permanecerIniciada" value=1>Permanecer Iniciada
            </label>
        </div>
        <fieldset class="form-group">
        <p>Inicia sesion con tu usuario/password</p>
            <input  type="hidden" name="registro" value=0>
            <input class="btn btn-success" type="submit" name="submit" value="Inicia Sesion">
        </fieldset> 
        <p><a class="alternarFormularios">Registrate</a></p>
    </form>
    </div>

   <?php include"footer.php"; ?>