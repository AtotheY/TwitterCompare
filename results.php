
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		require_once ('TwitterAPIExchange.php');
		require_once('oauth.php')
		//setting up OAUTH info
		// getting user Id's from previous page
		$userOne = '&screen_name=' . $_POST['user1'];
		$userTwo = '&screen_name=' . $_POST['user2'];
		$url1 = 'https://api.twitter.com/1.1/friends/ids.json';
		$url2 = 'https://api.twitter.com/1.1/friends/ids.json';
		$getfield1 = "?cursor=-1";
		$getfield1 .=  $userOne . "&count=5000";
		$getfield2 = "?cursor=-1";
		$getfield2 .= $userTwo . "&count=5000";
		$requestMethod = 'GET';
		ini_set('display_errors', 1);
		ini_set('display_start;
		up_errors', 1);
		error_reporting(E_ALL);
		$twitter = new TwitterAPIExchange($settings);
		$response1 = $twitter->setGetfield($getfield1)->buildOauth($url1, $requestMethod)->performRequest();
       		$response2 = $twitter->setGetfield($getfield2)->buildOauth($url2, $requestMethod)->performRequest();	
		$store1 = json_decode($response1, true);
		$store2 = json_decode($response2, true);
		//var_dump($store1);
		//var_dump($response1);
		$count = 0;
		$ids1 = $store1['ids'];
		$ids2 = $store2['ids'];
		$url3 = 'https://api.twitter.com/1.1/users/show.json';

		foreach ($ids1 as $data1) {
			foreach ($ids2 as $data2)
			{
				if ($data1 == $data2)
				{
					$count++;
					$getfield3 = "?user_id=".$data1;
					$response3 = $twitter->setGetfield($getfield3)->buildOauth($url3, $requestMethod)->performRequest();	
					$store3 = json_decode($response3,true);
					echo "Both users follow " . $store3['screen_id']."!";
					//echo $data1. "is equal to" . $data2;
					//echo "**";
				}
			}
		}
		echo "You have ".$count." friends in common!";
	?>
</body>
</html>
