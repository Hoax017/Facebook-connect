<?php

	require_once('config.php');
	$url = "http://localhost/fbconnect/";

	$facebookAppFields = [
		'user_photos',
		'email',
		'groups_access_member_info',
		'user_age_range',
		'user_birthday',
		'user_events',
		'user_friends',
		'user_gender',
		'user_hometown',
		'user_likes',
		'user_link',
		'user_location',
		'user_photos',
		'user_posts',
		'user_tagged_places',
		'user_videos'
	];

	try {
		$fb = new Facebook\Facebook([ 'app_id' => $facebookAppId, 'app_secret' => $facebookAppSecret, 'default_graph_version' => $facebookAppVersion]);
	} catch (Exception $e) {
		die($e->getMessage());
	}
	$helper = $fb->getRedirectLoginHelper();
	echo "<a href='{$helper->getReRequestUrl("http://localhost/fbconnect/facebookConnect.php", $facebookAppFields)}'>Connexion Facebook</a>";