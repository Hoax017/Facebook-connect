<?php

	require_once('config.php');
	try {
		if (empty($_SESSION['fb_token'])) throw new Exception("error");
		$fb = new Facebook\Facebook([ 'app_id' => $facebookAppId, 'app_secret' => $facebookAppSecret, 'default_graph_version' => $facebookAppVersion]);

		$userResponse = $fb->get('/me?fields=id,first_name,last_name,middle_name,name,name_format,picture,short_name,email', $_SESSION['fb_token']);

		$feedResponse = $fb->get("/me/feed", $_SESSION['fb_token']);

		var_dump($userResponse->getGraphUser(), $feedResponse->getGraphEdge());
	} catch (Exception $e) {
		unset($_SESSION['fb_token']);
		header("Location: /"); die;
	}