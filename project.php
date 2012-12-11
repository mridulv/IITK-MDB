<?php
mysql_connect("localhost","","")
or die("<h3>could not connect to MySQL</h3>\n");
mysql_select_db("test")
or die("<h3>could not select database 'test'</h3>\n");
$result = mysql_query("select * from project")
or die(mysql_error());
while ($row = mysql_fetch_array($result))
{
?>
<!-- <img src="a.php?id=<?php echo $row['id']; ?>" width="100" height="100"/> -->
<?php echo $row['image']; ?>
<a href="b.php?id=<?php echo $row['id']; ?>&choice=1"><img src="picture1.png" width="30" height="30"/></a>
<a href="b.php?id=<?php echo $row['id']; ?>&choice=2"><img src="picture2.jpg" width="30" height="30"/></a>
Likes:<input type="text" value="<?php echo $row['likes']; ?>" readonly="readonly"/>
Dislikes:<input type="text" value="<?php echo $row['dislikes']; ?>" readonly="readonly"/>
</br></br>
<?php
}
?>

