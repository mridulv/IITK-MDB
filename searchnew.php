<DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<title>Movie Search</title>
<style type="text/css">
/* SIMPLE STYLING FOR SEARCH RESULTS */
body { font-family:arial; font-size:12px; }
div.result { margin-bottom:15px; background-color:#efefef; padding:10px; }
div.result a { font-size:18px; font-weight:bold; }
div.result div { float:left; font-size:30px; font-weight:bold; margin-right:10px; color:#c0c0c0; }
</style>
</head>
<body>
<h1>Movie Search</h1>
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
	$url="http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20boss.search%20where%20ck%3D%0A'dj0yJmk9YWF3ODdGNWZPYjg2JmQ9WVdrOWVsWlZNRk5KTldFbWNHbzlNVEEyTURFNU1qWXkmcz1jb25zdW1lcnNlY3JldCZ4PTUz'%20and%20secret%3D'a3d93853ba3bad8a99a175e8ffa90a702cd08cfa'%20and%20sites%3D'imdb.com'%20and%20q%3D%22" . $_GET['movie'] ."%22%3B&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&format=json";
	$response = getResultFromYQL($url);
	
	$results = $response->query->results->bossresponse->web->results->result;
	$display=0;
	
	{
	foreach($results as $res) {
	if($display<7)
	{
	//echo "</br>";
	$store[$display]=($res->clickurl);
	//print($res->title->content);
	}
	else
	{
	break;	
	}
	$display+=1;
	}
	
	}
	?> <form method="post" action="data.php"> 
	<?php
	for($i=0;$i<7;$i++)
	{
?>

<input type="radio" name="select" value=<?php $i ?> /><?php echo $store[$i] ?><br />

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

/**
 * Function to get results from YQL
 *
 * @param String $yql_query
 * @return object response
 */
function getResultFromYQL($yql_query) {
    $session = curl_init($yql_query);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($session);
    curl_close($session);

    return json_decode($json);
}
?>
