<?php
    $salt = "hjasas8273a%98";
    $textoCifrado = md5($salt."password");
    echo $textoCifrado;

   
    /*
    // Conexion con la base de datos
    session_start();
    
    if (array_key_exists('username',$_POST) OR array_key_exists('password',$_POST))
    {
        $link = mysqli_connect("127.0.0.1", "root", "", "usuarios");
        if (mysqli_connect_error())
        {
            die("Hubo un error en la conexion, intentelo mas tarde");
        }
        if ($_POST['username']=='')
        {
            echo "<p>El nombre de usuario  es obligatorio</p>";
        }
        elseif ($_POST['password']=='')
        {
            echo "<p>El password de usuario  es obligatorio</p>";
        }
        else
        {
            // el usuario ha rellenado ambos campos
            $query ="SELECT username FROM usuarios WHERE username='".mysqli_real_escape_string($link,$_POST['username'])."'";
            $result= mysqli_query($link,$query);
            if(mysqli_num_rows($result)>0)
            {
                echo "<p>Ese nombre de usuario ya esta registrado. Intenta con otro</p>";
            }
            else
            {
                // Anadir a nuestrto usuario a la bd
                $query ="INSERT INTO usuarios(username,password)
                VALUES('".mysqli_real_escape_string($link,$_POST['username'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";
                if (mysqli_query($link,$query))
                {
                    $_SESSION['username']=$_POST['username'];
                    header("Location: session.php");
                    // echo "<p>!Enhorabuena! Has registrado tu cuenta</p>";
                }
                else
                {
                    echo "<p>Hubo un problema al registrar el usuario intentelo mas tarde</p>";
                }
            }
        }


    }



if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    
}
else{
// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

// Anadir un usuario a nuestra base de datos

    // $query ="INSERT INTO usuarios(username,password)VALUES('pepe','323232')";
    // mysqli_query($link,$query);
//Actualizar una fila Y TAMBIEN PUDEO USAR username en lugar de id para actualizar y poner lo correspondiente
// $query ="UPDATE usuarios SET password='comecome' WHERE id=3 LIMIT 1";
    // $query ="ALTER TABLE usuarios DROP columna";
    // mysqli_query($link,$query); 

    // $query = "SELECT * from usuarios WHERE id=3 OR id=1";
    // $query = "SELECT * from usuarios WHERE email LIKE '%gmail.com'";
    // if ($result = mysqli_query($link,$query))
    // {
        //  $fila = mysqli_fetch_array($result);
        // print_r($fila);
        // echo "Tu nombre de usuario es ".$fila['username']."y tu password es ".$fila['password']; 
        // while ($fila = mysqli_fetch_array($result))
        // {
            // print_r($fila); echo "<BR>";
        // }
    // }
    

// mysqli_close($link);*/
?>
<!--<h1>Registro de usuario</h1>
<form method="POST">
    <input type="text" name="username" placeholder="Escribe tu nombre de usuario">
    <input type ="password" name ="password">
    <input type="submit" vlaue="Registrar">
</form>
-->
