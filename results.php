<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		require_once ('TwitterAPIExchange.php');

		// setting up OAuth
		$settings = array('oauth_access_token' => "962554652-W3uFUXOMI6UYffcRTConjYBDY3QkcbqH6QBjqE0u", 'oauth_access_token_secret' => "DaurNka3j8r9Yc6ALwIxMJdyJZLFGdVhweIRHnosL31Jw", 'consumer_key' => "KdRTI0oBAIk94w7PiofD0cmo7", 'consumer_secret' => "xIN5Musw80Rlip31To4Gnfx4cZUm2KEoH500hkoLoUL7gmil1y");

		// getting user Id's from previous page
		$userOne = '?q=' . $_POST['user1'];
		$userTwo = '?q=' . $_POST['user2'];

		$url1 = 'https://api.twitter.com/1.1/users/search.json';
		$url2 = 'https://api.twitter.com/1.1/users/search.json';

		$getfield1 = $userOne;
		$getfield2 = $userTwo;
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		$response1 = $twitter->setGetfield($getfieldOne)->buildOauth($url1, $requestMethod)->performRequest();
        $response2 = $twitter->setGetfield($getfieldTwo)->buildOauth($url2, $requestMethod)->performRequest();

		$store1 = json_decode($response1, true);
		$store2 = json_decode($response2, true);
	?>
</body>
</html>