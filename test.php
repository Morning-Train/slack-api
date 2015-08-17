<?php

require 'vendor/autoload.php';

require 'slack/SlackApi.php';

define('SLACK_API_KEY', 'xoxp-2773489452-4731341932-9223660627-5b4179');

$slack_client = new SlackApi(SLACK_API_KEY);

echo '<pre>';

$result = $slack_client->getAllUsers();

if(isset($result)){
	var_dump($result);
}

echo '</pre>';

?>