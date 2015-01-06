<?php

require_once ('codebird.php');

// Conect with Twitter

function getTwitterData($searchQuery) {
	$cb = \Codebird\Codebird::getInstance();
	$cb->setConsumerKey("2fRXeSFofmel3Wif531fS4hca", "ZsQPIQ5IEKzBWNJcuaJvoqBfNxaZtDeQZIcziG7mHPpg1vZtib");
	$cb->setToken("15823751-qk7Qg241JqIicyr7NtXPucvawURpa0zeb4BJbNDkJ", "mwY4Lalzawi06mS1hw7YQlpwwL6NyR8NQxrP3FVIrYWiu");

	$params = array('q' => $searchQuery, 'count'=>100, 'result_type'=> 'mixed');

	$reply = (array) $cb->search_tweets($params);

	return $reply;
}

// Insert into data basis

function insertIntoDB($hashtag, $data) {
	$connection = mysqli_connect("localhost", "electionsdata", "3l3ct10ns", "elections");
	mysqli_set_charset($connection, "utf8");
	
	$d = (array) $data['statuses'];
	$count = count($data['statuses']);

	for ($a = 0; $a < $count; $a++) {
		$status = $d[$a];
		
		if (isset($status->retweeted_status)) {
			
			$userName = $status->user->screen_name; 
			$b = $status->retweeted_status;
			
		}
		else {
			$b = $status;
			
			$userName = $b->user->screen_name;
			$image = $b->user->profile_image_url;
			$text = $b->text;
			$getdate = date_create("$b->created_at");
			$date = date_format($getdate, "Y-m-d H:i:s");
			$id = $status->id_str;
			$location = $b->user->location;
			
			
						
			$q = "INSERT INTO twitterdata(twitter_id, image, user_name, text, hashtag, created_at, location) 
			VALUES ('$id', '$image', '$userName', '$text', '$hashtag', '$date', '$location')";

			echo $q."\n";
			mysqli_query($connection, $q);
		
		}
	}	
}

// Count twitters by candidate

function getCount($hashtag, $today) {

	$connection = mysqli_connect("localhost", "electionsdata", "3l3ct10ns", "elections");
	mysqli_set_charset($connection, "utf8");

	$q = "SELECT COUNT(*) FROM twitterdata WHERE hashtag = '$hashtag' AND created_at >= '$today'";
	$result = mysqli_query($connection, $q);

	while($row = mysqli_fetch_assoc($result)){
		$count = $row['COUNT(*)'];
	}
	
	return $count;
}	
?>