<?php

	require_once('config.php');
	try {
		$fb = new Facebook\Facebook([ 'app_id' => $facebookAppId, 'app_secret' => $facebookAppSecret, 'default_graph_version' => $facebookAppVersion]);
		$helper = $fb->getRedirectLoginHelper();

		$token = $helper->getAccessToken();
		if (!$token || $token->isExpired()) throw new Exception("error");
		if (!$token->isLongLived()) {
			// Exchanges a short-lived access token for a long-lived one
			$token = $fb->getOAuth2Client()->getLongLivedAccessToken($token);
		}
		$_SESSION['fb_token'] = $token->getValue();
		header("Location: /fbconnect/connected.php"); die;
	} catch (Exception $e) {
		header("Location: /"); die;
	}