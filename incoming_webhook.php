<?php

$mode = $_REQUEST['mode'];

switch ($mode) {
	
	case 'post':
	default:
		$slackURL = "";
		
		$clientID = ""; // Get this from your app management screen
		$clientSecret = ""; // Get this from your app management screen
		
		$payload = array();
		$payload['text'] = "New portfolio submitted.";
		$payload['username'] = "MaharaBot";
		$payload['icon_emoji'] = ":ghost:";
		$attachments = array();
		$attachments['title'] = "Darren's Portfolio";
		$attachments['title_link'] = "http://staticred.com";
		$attachments['text'] = "Submitted by Darren Harkness at " . date("Y-m-d h:i");
		$attachments['color'] = 'good';
		$payload['attachments'] = array($attachments);
		$json = json_encode($payload);
		
		$curl = curl_init($slackURL);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER,
		        array("Content-type: application/json"));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
		
		$json_response = curl_exec($curl);
		
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		if ( $status != 200 ) {
		    die("Error: call to URL $slackURL failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
		}
		
		
		curl_close($curl);
		
		$response = json_decode($json_response, true);
		
		break;
	}
	
