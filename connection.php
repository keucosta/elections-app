<?php

require_once ('dilmadata.php');


$connection = mysqli_connect("localhost", "electionsdata", "3l3ct10ns", "elections");
mysqli_set_charset($connection, "utf8");


	for ($a = 0; $a < $s; $a++){
	$status = $data[$a];
	
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

	require_once ('aeciodata.php');

$connection = mysqli_connect("localhost", "electionsdata", "3l3ct10ns", "elections");
mysqli_set_charset($connection, "utf8");

	for ($a = 0; $a < $s; $a++){
	$status = $data[$a];
	
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
		VALUES ('$id', '$image','$userName', '$text', '$hashtag', '$date', '$location')";

		echo $q."\n";
		mysqli_query($connection, $q);
		
	}
}
	
require_once ('eduardodata.php');

$connection = mysqli_connect("localhost", "electionsdata", "3l3ct10ns", "elections");
mysqli_set_charset($connection, "utf8");

	for ($a = 0; $a < $s; $a++){
	$status = $data[$a];
	
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
		VALUES ('$id', '$image','$userName', '$text', '$hashtag', '$date', '$location')";

		echo $q."\n";
		$result = mysqli_query($connection, $q);
	}
}
		
?> 

