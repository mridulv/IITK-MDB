<?php
if (isset($_REQUEST['select'])){
mysql_connect("localhost","","")
or die("<h3>could not connect to MySQL</h3>\n");
mysql_select_db("test")
or die("<h3>could not select database 'test'</h3>\n");
$a=$_REQUEST['select'];
echo "mrjsvdjnsk";
$result = mysql_query("insert into project(image,likes,dislikes) values('$a','0','0')") or die(mysql_error());
}
header ('location: http://localhost/projectyahoo/index.php');
?>