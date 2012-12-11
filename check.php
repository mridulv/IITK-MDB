<?php
if ((isset($_COOKIE['user']))){
session_start();
$expire=time()+24*60*60;
$w=$_COOKIE["user"];
setcookie("user",$w,$expire);
echo $_COOKIE['user'];
?>
<a href="logoutproject.php">logout</a>
<?php
}
else{
header ('location: http://localhost/projectyahoo/loginproject.php');
}
?>
