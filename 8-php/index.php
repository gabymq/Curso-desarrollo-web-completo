<?php
    header("Content-type: text/html;charset=\"utf-8\"");
    $emailTo = "correoagmorenogaby@gmail.com";
    $subject = "Curso Desarrollo Web Completo";
    $body = "Me esta encantando en curso!";
    $headers = "From: gmorenogaby@example.com";

    if (mail($emailTo,$subject,$body,$headers))
    {
         echo "Mensaje enviado con exito!";
    }
    else
    {
        echo "Hubo un error al enviar el mensaje";
    }


/*$nombre = "Jose Luis";
$nombre2 ="Curso de desarrollo web completo";
echo "<html>\n\t<head>\n\t\t<meta charset=\"utf-8\">\n\t<head>";
echo "\n<body>";
echo "\n\t<p>Mi nombre es $nombre</p>";
echo "\n\t<p>".$nombre." es el instructor del ".$nombre2."</p>";

echo "\n</body";
echo "\n</html>";
$numero= 50;
$calculo= $numero / 2 + 6;
echo $calculo/4;

$logico = true;
echo "<p>El tipo booleando o logico siguiente tiene el valor de $logico</p>";
$variableNombre = "nombre";
echo $$variableNombre;

Array
$miArray = array(1,3,4,5,1);
print_r($miArray);
echo "<br><br>";
echo "La longitud de mi array es ".sizeof($miArray);
echo "<br><br>";
$miArray2["dia"]="lunes";
$miArray2["mes"]="agosto";
$miArray2["year"]="2016";
echo "<br><br>";
var_dump($miArray2);
unset($miArray2["year"]);
echo "<br><br>";
print_r($miArray2);
$miArrayAlReves = array_reverse($miArray);
echo "<br><br>";
print_r($miArrayAlReves);
$trozoArray = array_splice($miArray,2);
echo "<br><br>";
print_r($trozoArray);
 if else
  $usuario = "Jose Luis";
    if ($usuario == "Rob" || $usuario == "Jose Luis")
    {
        //Instrucciones que se ejecutan si es cierto
        echo "<h1>Bienvenido $usuario</h1>";
    }
    else
    {
        //En caso contrario
        //vamos a mostrar lo siguiente
        echo "<h1>Lo sentimos $usuario, no tiene acceso al sistema</h1>";
    }
    $edad=15;
    //comprobar la mayoria de edad del usuario
    if($edad >=18)
    {
        echo"<h1>Puede acceder al portal con esta edad</h1>";

    }
    else
    {
        echo "<h1>Lo sentimos tiene que tener al menos 18 años</h1>";
    }
    
    Esta es una manera de iterar
    familia = Array("Penelope","Jose Luis","Antonio","Pepe");
    echo "<h1>Familia</h1>";
    foreach($familia as $valor)
    {
        echo "<p>$valor</p>";
    }
    Manera mas elegante de iterar con el foreach
    $familia = Array("Penelope","Jose Luis","Antonio","Pepe");
    echo "<h1>Familia</h1>";
    foreach($familia as $clave => $valor)
    {
        echo "<p>$familia[$clave]</p>";
    }
    
    echo "<p>Fin del Forech</p>";
    
    echo "<p>Fin del Forech</p>";
    Ciclo while
    $i=1;
    while ($i<=10)
    {
        //Instrucciones a repetir
        echo "<p>$i</p>";
        //Modificacion de i
        $i=$i+1;
    }
S
while ($i<=10)
    {
        $numero=5*$i;
        //Instrucciones a repetir
        echo "<p>$numero</p>";
        //Modificacion de i
        $i=$i+1;
    }
    $familia = Array("Penelope","Jose Luis","Pepe","Antonio");
    $i=0;
    while ($i<sizeof($familia))
    {
    
        //Instrucciones a repetir
        echo "<p>$familia[$i]</p>";
        //Modificacion de i
        $i=$i+1;
    }

    Get
     if ($_GET)
        echo "<h1>Hola ".$_GET['nombre']."</h1><br>";

<form>
    Escribe tu nombre:
    <input name="nombre" type="text">
    <input type="submit" value="Enviar">
</form>
Utilizando variables de tipo GET
  if ($_GET){
    if (is_numeric($_GET['numero']) && $_GET['numero']>1 
    && $_GET['numero']==round($_GET{'numero'},0))
    {
            //comprobacion para ver si es primo
            $esPrimo = true;
            $i = 2;
            while ($i < $_GET['numero'] && $esPrimo)
            {
                //si el numero dividido por 1 su resto es 0 entonces ==>primo
                if ($_GET['numero']%$i == 0)
                {
                    $esPrimo =false;
                }
                $i++;
            }
            if ($esPrimo)
                echo "<p>El numero ".$_GET['numero']."es primo</p>";
            else
                echo "<p>El numero ".$_GET['numero']."NO es primo</p>";
                }
        else
        {
            echo "<p>Error! Introduce numero natiral mayor que 1!</p>";
        }
   }

<h1>Verificador de numeros primos</h1>
<form>
    Introduce un numero natural mayor que 1:
    <input name="numero" type="text">
    <input type="submit" value="Enviar">
</form>
Un formulario de adivina el numero primo con el metodo get
 if ($_GET){
    if (is_numeric($_GET['numero']) && $_GET['numero']>1 
    && $_GET['numero']==round($_GET{'numero'},0))
    {
            //comprobacion para ver si es primo
            $esPrimo = true;
            $i = 2;
            while ($i < $_GET['numero'] && $esPrimo)
            {
                //si el numero dividido por 1 su resto es 0 entonces ==>primo
                if ($_GET['numero']%$i == 0)
                {
                    $esPrimo =false;
                }
                $i++;
            }
            if ($esPrimo)
                echo "<p>El numero ".$_GET['numero']."es primo</p>";
            else
                echo "<p>El numero ".$_GET['numero']."NO es primo</p>";
                }
        else
        {
            echo "<p>Error! Introduce numero natiral mayor que 1!</p>";
        }
   }

<h1>Verificador de numeros primos</h1>
<form>
    Introduce un numero natural mayor que 1:
    <input name="numero" type="text">
    <input type="submit" value="Enviar">
</form>

metodo post

//print_r($_POST);
    //echo $_POST['nombre'];
    if ($_POST)
    {
        $usuarios = array("Jose Luis","Penelope","Antonio","Pepe");
        $esConocido=false;
        foreach ($usuarios as $valor)
        {
            if ($valor == $_POST['nombre'])
            {
                $esConocido=true;
            }
        }
        if ($esConocido)
        {
            echo "<h1>Bienvenido ".$_POST['nombre']."!</h1>";

        }
        else
        {
            echo "<h1>Usuario incorrecto!</h1>";
        }
    }
<form method="POST">
¿Cuál es tu nombre?
    <input name="nombre" type="text">
    <input type="submit" value="Enviar">
</form>

prpiedad mail
 $emailTo = "correoagmorenogaby@gmail.com";
    $subject = "Curso Desarrollo Web Completo";
    $body = "Me esta encantando en curso!";
    $headers = "From: gmorenogaby@example.com";

    if (mail($emailTo,$subject,$body,$headers))
    {
         echo "Mensaje enviado con exito!";
    }
    else
    {
        echo "Hubo un error al enviar el mensaje";
    }
Nota: ademas de que se tiene que tener un smtp para poder hacer que se envie el mensaje con seguridad y que los puertos esten establecidos
*/
?>


