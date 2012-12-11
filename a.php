<?php
mysql_connect("localhost","","")
or die("<h3>could not connect to MySQL</h3>\n");
mysql_select_db("test")
or die("<h3>could not select database 'test'</h3>\n");
$id=$_REQUEST['id'];
header('Content-type: image/jpeg');
$query = "SELECT * from project where id=$id";
$rs = mysql_fetch_array(mysql_query($query));
echo base64_decode($rs['image']);
?>