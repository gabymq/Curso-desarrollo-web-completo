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
          <h1>Localizador de Códigos Postales</h1>
          <p>Introduce una dirección para obtener tu código postal</p>
          <div id="mensaje"></div>
          <form>
            <fieldset class="form-group">
            
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" id="direccion"  placeholder="Introduzca la direccion">
            
            </fieldset>
          
      
          <button  class="btn btn-primary" id="encontrar-cp">Send</button>
          </form>
</div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script type="application/javascript">
      $("#encontrar-cp").click(function(e){
        e.preventDefault();
        $.ajax({
          url:"https://maps.googleapis.com/maps/api/geocode/json?address="+encodeURIComponent($("#direccion").val())+"&key=AIzaSyAqPRuErzQpusmYfZEUUwXnoHleFvcWeqY",
          type:"GET",
          success: function(datos){
            console.log(datos);
            if (datos['status']!="OK")
            {
                 $("#mensaje").html('<div class="alert alert-danger" role="alert"><strong>Imposible obtener el codigo postal!</strong>Intente suministrar mas informacion</div>');
            }
            else{

              
              $.each(datos['results'][0]['address_components'], function(clave,valor){
                if (valor['types'][0]=="postal_code"){
                  $("#mensaje").html('<div class="alert alert-success" role="alert"><strong>Codigo Postal encontrado!</strong> El C.P. es  '+valor['long_name']+'</div>');
                }
              })
            }
          }
        })


      })
    </script>
  </body>
</html>