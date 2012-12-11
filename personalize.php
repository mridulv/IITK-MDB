<?php
if ((isset($_COOKIE['user']))){
session_start();
$expire=time()+24*60*60;
$w=$_COOKIE["user"];
setcookie("user",$w,$expire);
function getResultFromYQL($yql_query) {
    $session = curl_init($yql_query);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($session);
    curl_close($session);

    return json_decode($json);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<style type="text/css">
div.result { margin-bottom:15px; background-color:#efefef; padding:10px; }
div.result a { font-size:18px; font-weight:bold; }
div.result div { float:left; font-size:30px; font-weight:bold; margin-right:10px; color:#c0c0c0; }
</style>
<title>Iitk MDb</title>
</head>
<body>
<div id="title" align="center">
<div id="top">
<span style="float:left;">Welcome <?php echo $_COOKIE['user']; ?></span>
<span style="float:right;"><a href="logoutproject.php" style="color:white;text-decoration:none;">Logout</a></span>
</div>
</div>
<center>
<img src = "images/logo.png" height="120px;" width="350px;" style="margin-right:-20px;padding-top:35px;"/>
</center>
<div id="everything">
<div id="leftdiv">
<?php
mysql_connect("localhost","","")
or die("<h3>could not connect to MySQL</h3>\n");
mysql_select_db("test")
or die("<h3>could not select database 'test'</h3>\n");
$result = mysql_query("select * from project ORDER BY likes DESC")
or die(mysql_error());
while ($row = mysql_fetch_array($result))
{
?>
<!-- <img src="a.php?id=<?php echo $row['id']; ?>" width="100" height="100"/> -->
<div id="name">
<a href="doc.php?name=<?php echo $row['image']; ?>" style="color:white;text-decoration:none;"><?php echo $row['image']; ?></a>
</div>
<?php
$p=0;
$result2 = mysql_query("select * from movies")
or die(mysql_error());
while ($row2 = mysql_fetch_array($result2))
{
if (($row2['movie']==$row['image']) && ($row2['user']==$_COOKIE['user'])){
$p=1;
}
}
?>
<?php
if ($p){
?>
<div id="lbut" style="opacity:0.3;">
<img src="images/lbut.png" width="100" height="30"/>
</div>
<div id="ltext" style="opacity:0.3;">
<input type="text" value="<?php echo $row['likes']; ?>" readonly="readonly" style="width:30px;height:27px;border:none;"/>
</div>
<div id="dbut" style="opacity:0.3;">
<img src="images/dbut.png" width="100" height="30"/>
</div>
<div id="dtext" style="opacity:0.3;">
<input type="text" value="<?php echo $row['dislikes']; ?>" readonly="readonly" style="width:30px;height:27px;border:none;"/>
</div>
</br></br></br>
<?php
}
else{
?>
<div id="lbut">
<a href="b.php?id=<?php echo $row['id']; ?>&choice=1&user=<?php echo $_COOKIE['user']; ?>"><img src="images/lbut.png" width="100" height="30"/></a>
</div>
<div id="ltext">
<input type="text" value="<?php echo $row['likes']; ?>" readonly="readonly" style="width:30px;height:27px;border:none;"/>
</div>
<div id="dbut">
<a href="b.php?id=<?php echo $row['id']; ?>&choice=2&user=<?php echo $_COOKIE['user']; ?>"><img src="images/dbut.png" width="100" height="30"/></a>
</div>
<div id="dtext">
<input type="text" value="<?php echo $row['dislikes']; ?>" readonly="readonly" style="width:30px;height:27px;border:none;"/>
</div>
</br></br></br>
<?php
}
?>
<a href="person.php?user=<?php echo $_COOKIE['user']; ?>&id=<?php echo $row['id']; ?>" style="text-decoration:none;"><button type="button">Add to list</button></a>
<?php
}
?>

<div id="entry">
<div id="photo"></div>
<div id="name"></div>
<div id="lbut"></div>
<div id="ltext"></div>
<div id="dbut"></div>
<div id="dtext"></div>
</div>

</div>
<div id ="rightdiv">
<form action="" method="get">
<?php
echo 'Search for <input type="text" name="movie" value=""';

if(empty($_GET['movie']))
  $_GET['movie']="";

// Echo the query in the search text field 
$query = htmlentities($_GET['movie'], ENT_QUOTES, 'UTF-8');
echo $query . '" />   <input type="submit" value="Go" /></form>';

// If there is a query
if(!empty($_GET['movie']))
{
	echo '<hr />';
      //  $url="http://query.yahooapis.com/v1/public/yql?q=";
        //$url= $url . urlencode("select * from search.web where query=@movie and sites='imdb.com,movies.yahoo.com,indiatimes.com'");
       // $url= $url . "&movie=" . urlencode($_GET['movie']); 
      //  var_dump($url);
	//$url="http://boss.yahooapis.com/ysearch/web/v1/".urlencode($_GET['q'])."?appid=&sites=imdb.com,movies.yahoo.com,indiatimes.com&format=xml";
	$url="http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20boss.search%20where%20ck%3D%0A'dj0yJmk9YWF3ODdGNWZPYjg2JmQ9WVdrOWVsWlZNRk5KTldFbWNHbzlNVEEyTURFNU1qWXkmcz1jb25zdW1lcnNlY3JldCZ4PTUz'%20and%20secret%3D'a3d93853ba3bad8a99a175e8ffa90a702cd08cfa'%20and%20sites%3D'imdb.com'%20and%20q%3D%22" .urlencode($_GET['movie']) ."%22%3B&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&format=json";
	$response = getResultFromYQL($url);
	//var_dump($response);
	
	//var_dump($results);
	$display=0;
	

 if(!(($response->query->results->bossresponse->web->results->result)==NULL))
{	
		
$results = ($response->query->results->bossresponse->web->results->result);
	foreach($results as $res) {
		//var_dump($res);
		//echo "<br/>";
		if($display<7)
		{
	//echo "</br>";
			$store[$display]=($res->title->content);
			
	//print($res->title->content);
		}
		else
		{
			break;	
		}
		$display+=1;
	}


	?>

	<form method="post" action="data.php"> 
	<?php
	for($i=0;$i<7;$i++)
	{
?>

<input type="radio" name="select" value="<?php echo $store[$i]; ?>" /><?php echo $store[$i]; ?><br />

<?php
}
?>

</br>
<input type="submit" value="submit" name="submit">
</form>

<?php	
	//foreach($store as $st) {
	//print($st);
	//}
	/*
	$xml=simplexml_load_file($url);
        //var_dump($xml);
	foreach ($xml->results->result as $item) {
	 echo '<div class="result"><a href="'.$item->url.'">'.$item->title.'</a><b r/>'.$item->abstract.'<br><font color="green">'.$item->dispurl.'</font></div>';
	}
	*/
}
}
/**
 * Function to get results from YQL
 *
 * @param String $yql_query
 * @return object response
 */
}
else{
header ('location: http://localhost/projectyahoo/loginproject.php');
}
?>
</div>
</div>
</body>
<html>
</html>
