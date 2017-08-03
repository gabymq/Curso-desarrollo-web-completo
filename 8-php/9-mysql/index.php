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
        $link = mysqli_connect("127.0.0.1", "root", "", "diario");
        if (mysqli_connect_error())
        {
            die("Hubo un error en la conexion, intentelo mas tarde");
        }
        if (!$_POST['email'])
        {
            $error .= "<br>Email requerido.";
        }
         if (!$_POST['password'])
        {
            $error .= "<br>Password requerido.";
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
                        $error="<p>No hemos podido completar en registro, porfavor intentelos mas tarde</p>";
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
                    $passwordHasheada=md5(md5($fila['id'].$_POST['password']));
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
            }
        }
    
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style type="text/css">

        .container
        {
            text-align:center;
            width:400px;
            margin-top:150px;
        }
        html { 
        background: url(background.jpg) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;    
        -o-background-size: cover;
        background-size: cover;
        }
        body
        {
            background: none;
            color: #FFFFFF;

        }
        #formularioLogin{
            display: none;
        }
        .alternarFormularios
        {
            font-wieght:bold;
        }
    </style>
  </head>
  <body>
    <div class="container">
    <h1>Diario Secreto</h1>
    <div id="error">
    <?php echo $error; ?>
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
            <input class="form-control" type="hidden" name="registro" value=1>
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
            <input class="form-control" type="hidden" name="registro" value=0>
            <input class="btn btn-success" type="submit" name="submit" value="Inicia Sesion">
        </fieldset> 
        <p><a href="registrate" class="alternarFormularios">Registrate</a></p>
    </form>
    </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script type="application/javascript">
        $(".alternarFormularios").cilck(function(){
            $("#formularioRegistro").toggle();
            $("#formularioLogin").toggle();

        });
    
  </body>
</html>
