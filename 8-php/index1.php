<?php
    $error="";
    $mensajeExito="";

    if($_POST){
        //comprobaciones sobre campos
        if (!$_POST["email"]){
            $error .= "Es obligatoria una direccion de email.<br>";
        }
        if (!$_POST["contenido"]){
            $error .= "Es obligatorio escribir un mensaje.<br>";
        }
        if (!$_POST["asunto"]){
            $error .= "Es obligatorio el campo asunto.<br>";
        }
        if ($_POST["email"] && filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)=== false){
            $error .= "Correo electronico no valido.<br>";
        }
        if ($error !="")
        {
            $error = '<div class="alert alert-danger" role="alert"><p>Hubo algún error en el formulario:</p>'.$error."<strong></div>";
        }
        else
        {
            $emailA = "correoagmorenogaby@gmail.com";
            $asunto = $_POST['asunto'];
            $contenido = $_POST['contenido'];
            $cabeceras = "From:".$_POST['email'];
            if (mail($emailA,$asunto,$contenido,$cabeceras)){
                $mensajeExito = '<div class="alert alert-success" role="alert">Mensaje enviado con éxito, nos pondremos en contacto pronto!</div>';
            }
            else{
                $error =$error ='<div class="alert alert-danger" role="alert"><p><strong>El mensaje no pudo ser enviado, por favor inténtalo más tarde</div>';
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
  </head>
  <body>
    <div class="container">
            <h1>Contact us!!!</h1>
            <div id="error"><? echo $error.$mensajeExito; ?></div>
            <form method="post">
                   <fieldset class="form-group">
                  <label for="email">Adress email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                  <small class="text-muted">We will not share your email with anyone.</small>
            </fieldset>
            <fieldset class="form-group">
                  <label for="asunto">Affair</label>
                  <input type="text" class="form-control" id="asunto" name="asunto" >
            </fieldset>
            <fieldset class="form-group">
                  <label for="contenido">What is your question?</label>
                  <textarea class="form-control" id="contenido" name="contenido" rows="3"></textarea>
            </fieldset>
                  <button type="submit" id="submit" class="btn btn-primary">Send</button>
            
            
            </form>
    </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $("form").submit(function(e){
            

                var error= "";

                if ($("#email").val()=="")
                {
                    error += "email required.<br>";
                }
                if ($("#asunto").val()=="")
                {
                    error += "Field affair required.<br>";
                }
                if ($("#contenido").val()=="")
                {
                    error += "Field content required.<br>";
                }
                if (error !="")
                {
                    $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>Hubo algún error en el formulario</strong></p>' + error + '</div>');
                    return false;
                }
                else
                {
                    return true;
                }
            })
        
        </script>
  </body>
</html>