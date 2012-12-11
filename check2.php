<?php
if ((isset($_REQUEST['submit'])) && (isset($_REQUEST['email']))){
mysql_connect("localhost","","")
or die("<h3>could not connect to MySQL</h3>\n");
mysql_select_db("test")
or die("<h3>could not select database 'test'</h3>\n");
$a=$_REQUEST['email'];
$result = mysql_query("select * from users")
or die(mysql_error());
$m=1;
while($row=mysql_fetch_array($result)){
if ($row['emailid']==$a && $row['activate']=='1'){
$m=0;
session_start();
$expire=time()+24*60*60;
setcookie("user",$a,$expire);
header ('location: http://localhost/projectyahoo/index.php');
}
}
if ($m==1){
$result2 = mysql_query("select * from users")
or die(mysql_error());
while($row2=mysql_fetch_array($result2)){
if ($row2['emailid']==$a && $row2['activate']=='0')
{
$m=2;
header ('location: http://localhost/projectyahoo/loginproject.php');
}
}
if($m!=2){
$b=rand();
echo "an email has been send to verify the user please click on the link to verify the account";
mysql_query("insert into users(emailid,random,activate) values('$a','$b','0')")
or die(mysql_error());
}
}
}
else{
header ('location: http://localhost/projectyahoo/loginproject.php');
}
?>