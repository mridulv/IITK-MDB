<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/style2.css" />
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
</br></br></br>
<img src = "images/logo.png" height="120px;" width="350px;" style="margin-right:-20px;"/>
</center>
<div id="everything">
<div style="border-radius:20px;color:white;width:1100px;height:400px;background-color:rgba(0,0,0,0.7);padding:20px;">

<div id="photo">
<?php
function getResultFromYQL($yql_query) {
    $session = curl_init($yql_query);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($session);
    curl_close($session);

    return json_decode($json);
	}
if(!empty($_REQUEST['name']))
{
	echo '<hr />';
      //  $url="http://query.yahooapis.com/v1/public/yql?q=";
        //$url= $url . urlencode("select * from search.web where query=@movie and sites='imdb.com,movies.yahoo.com,indiatimes.com'");
       // $url= $url . "&movie=" . urlencode($_REQUEST['name']); 
      //  var_dump($url);
	//$url="http://boss.yahooapis.com/ysearch/web/v1/".urlencode($_GET['q'])."?appid=&sites=imdb.com,movies.yahoo.com,indiatimes.com&format=xml";
	//$url="http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20boss.search%20where%20ck%3D%0A'dj0yJmk9YWF3ODdGNWZPYjg2JmQ9WVdrOWVsWlZNRk5KTldFbWNHbzlNVEEyTURFNU1qWXkmcz1jb25zdW1lcnNlY3JldCZ4PTUz'%20and%20secret%3D'a3d93853ba3bad8a99a175e8ffa90a702cd08cfa'%20and%20sites%3D'imdb.com'%20and%20q%3D%22" . $_REQUEST['name'] ."%22%3B&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&format=json";
	$url="http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20boss.search%20where%20ck%3D%0A'dj0yJmk9YWF3ODdGNWZPYjg2JmQ9WVdrOWVsWlZNRk5KTldFbWNHbzlNVEEyTURFNU1qWXkmcz1jb25zdW1lcnNlY3JldCZ4PTUz'%20and%20secret%3D'a3d93853ba3bad8a99a175e8ffa90a702cd08cfa'%20and%20service%3D'images'%20and%20q%3D%22" . urlencode($_REQUEST['name']) ."%22%3B&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&format=json";
	$response = getResultFromYQL($url);
	
	$results = $response->query->results->bossresponse->images->results->result;
	$display=0;
	
	{
	foreach($results as $res) {
	if($display<1)
	{
	//echo "</br>";
	$store[$display]=($res->clickurl);
	//print($res->clickurl);
	?>
	<img src="<?php echo $store[0]; ?>" height="370" width="400"/>
	<?php
	}
	else
	{
	break;	
	}
	$display+=1;
	}
	
	}
	
	
	
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

/**
 * Function to get results from YQL
 *
 * @param String $yql_query
 * @return object response
 */
?>
</div>
<div id="rhs">
<div id="query"><center><b><i><?php echo $_REQUEST['name']; ?></i></b></center></div>
<br /><br />
<div id="abstract">
<?php

	if(!empty($_REQUEST['name']))
{
	echo '<hr />';
      //  $url="http://query.yahooapis.com/v1/public/yql?q=";
        //$url= $url . urlencode("select * from search.web where query=@movie and sites='imdb.com,movies.yahoo.com,indiatimes.com'");
       // $url= $url . "&movie=" . urlencode($_REQUEST['name']); 
      //  var_dump($url);
	//$url="http://boss.yahooapis.com/ysearch/web/v1/".urlencode($_GET['q'])."?appid=&sites=imdb.com,movies.yahoo.com,indiatimes.com&format=xml";
	$url="http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20boss.search%20where%20ck%3D%0A'dj0yJmk9YWF3ODdGNWZPYjg2JmQ9WVdrOWVsWlZNRk5KTldFbWNHbzlNVEEyTURFNU1qWXkmcz1jb25zdW1lcnNlY3JldCZ4PTUz'%20and%20secret%3D'a3d93853ba3bad8a99a175e8ffa90a702cd08cfa'%20and%20sites%3D'imdb.com'%20and%20q%3D%22" .urlencode($_REQUEST['name']) ."%22%3B&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&format=json";
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
		if($display<1)
		{
	//echo "</br>";
			$store[$display]=($res->abstract->content);
			
	print($res->abstract->content);
		}
		else
		{
			break;	
		}
		$display+=1;
	}


		
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
 ?>
 </div>
</div>

</div>
</div>
</html>