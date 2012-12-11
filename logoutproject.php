<?php
if (isset($_COOKIE["user"]))
{
$expire=time()-24*60*60;
setcookie("user","",$expire);
session_destroy();
header('Location: http://localhost/projectyahoo/loginproject.php');
}
else
header('Location: http://localhost/projectyahoo/loginproject.php');
?>