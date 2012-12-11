<?php
mysql_connect("localhost","","")
or die("<h3>could not connect to MySQL</h3>\n");
mysql_select_db("test")
or die("<h3>could not select database 'test'</h3>\n");
$b=$_REQUEST['id'];
$query =mysql_query("select * from project where id=$b") or die(mysql_error());
while($row=mysql_fetch_array($query)){
mysql_connect("localhost","","")
or die("<h3>could not connect to MySQL</h3>\n");
mysql_select_db("test")
or die("<h3>could not select database 'test'</h3>\n");
$m=$row['image'];
$n=$_REQUEST['user'];
$query=mysql_query("insert into personalize(movie,user) values('$m','$n')") or die(mysql_error());
header ('location: http://localhost/projectyahoo/index.php');
}
?>
