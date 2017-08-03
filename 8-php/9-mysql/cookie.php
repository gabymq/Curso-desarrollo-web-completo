<?php 
setcookie("lang","en",time()+60*60*24*3);
// unset($_COOKIE['lang']);
echo $_COOKIE['lang'];
/*name is your cookie's name
value is cookie's value
$int is time of cookie expires*/
?>