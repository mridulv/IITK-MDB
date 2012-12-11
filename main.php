<?php
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
	<img src="<?php echo $store[0]; ?>">
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
function getResultFromYQL($yql_query) {
    $session = curl_init($yql_query);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($session);
    curl_close($session);

    return json_decode($json);
}
?>

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