<!--<?php
//echo
    //file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyCRf2SJoGLvb19E6OYggWw6u7v054li1oU");

?>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Geodificacion de una direccion</title>
</head>
<body>
    
</body>
<script
  src="http://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $.ajax({
        url:"https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyCRf2SJoGLvb19E6OYggWw6u7v054li1oU",
        type:"GET",
        success:function(datos){
            //uyilizamos un iterador
            $.each(datos['results'][0]['address_components'], function(clave,valor)
            {
                if(valor['types'][0]=='country')
                {
                    alert(valor['long_name']);

                }
            })

        }
    })

</script>
</html>