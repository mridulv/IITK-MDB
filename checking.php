<?php
if (isset($_REQUEST['random'])){
mysql_connect("localhost","","")
or die("<h3>could not connect to MySQL</h3>\n");
mysql_select_db("test")
or die("<h3>could not select database 'test'</h3>\n");
$a=$_REQUEST['email'];
$b=$_REQUEST['random'];
$result = mysql_query("select * from users")
or die(mysql_error());
while($row=mysql_fetch_array($result)){
if ($row['emailid']==$a && $row['random']==$b){
$query = "UPDATE users SET activate='1' WHERE random='$b'";
  mysql_query($query) or die(mysql_error());
  }
  }
  }
  header ('location: http://localhost/projectyahoo/loginproject.php');
  ?>
  
