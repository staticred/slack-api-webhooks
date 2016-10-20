<?php


$cfg = new stdClass;
$cfg->token = ""; // get this from your app management screen

$token = isset($_REQUEST['token']) & $_REQUEST['token'] != '' ? $_REQUEST['token'] : NULL;

switch ($token) {

	// Handle drive-bys
	case $token = $cfg->token:	
	default:
		// let's grab the data
		$user_name = $_REQUEST['user_name'];

		
		
		// Send something back.		
		
		$giphyurls[] = 'http://i.giphy.com/atbiDI1fXpYUU.gif';
		$giphyurls[] = 'http://i.giphy.com/l0K45TBOxRugAIqQw.gif';
		$giphyurls[] = 'http://i.giphy.com/l2Sq2uNQlDC6grGVy.gif';
		$giphyurls[] = 'http://i.giphy.com/3o85xpqgSEA5GNmY2Q.gif';
	
		$payload = array();
		$payload['response_type'] = "ephemeral";
		$payload['text'] = "Hey there {$user_name}. Why you talking shit about Giphy?!";
		$attachments = array();
		$attachments['title'] = "Giphy Sucks";
		$attachments['image_url'] = $giphyurls[rand(0,sizeof($giphyurls)-1)];
		$payload['attachments'] = array($attachments);
		$json = json_encode($payload);
				
				
		header("content-type: application/json");
		print($json);		
		break;


	// OK, we've got a token. 
	default:
		error_log("Invalid token supplied.");		
		break;
	
}



