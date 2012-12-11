<?php
session_start();
if (isset($_SESSION['user']))
{
$expire=time()-24*60*60;
setcookie("user","",$expire);
session_destroy();
}
?>
<form action="check2.php" type="get">
<input type="email" name="email"/>
<input type="submit" name="submit" value="Submit"/>
</form>