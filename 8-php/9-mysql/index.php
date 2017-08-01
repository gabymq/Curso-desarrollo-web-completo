<?php
    // Conexion con la base de datos

$link = mysqli_connect("127.0.0.1", "root", "", "usuarios");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    
}
else{
// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
    $query = "SELECT * from usuarios";
    if ($result = mysqli_query($link,$query))
    {
        $fila = mysqli_fetch_array($result);
        print_r($fila);
    }
    
}

mysqli_close($link);
?>