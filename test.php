<?php

require 'vendor/autoload.php';

require 'slack/SlackApi.php';

define('SLACK_API_KEY', 'xoxp-2773489452-4731341932-9223660627-5b4179');

$slack_client = new SlackApi(SLACK_API_KEY);

echo '<pre>';

// $result = $slack_client->getAllUsers();

// $result = $slack_client->getUserById('U04MHA1TE');

// $result = $slack_client->setUserPresence('auto');

// $result = $slack_client->getUserPresenceById('U04MHA1TE');

// $result = $slack_client->setCurrentUserAsActive();

// $result = $slack_client->getTeam();

// $result = $slack_client->getTeamAccessLogs(10, 2); //Requires admin scope to test

// $result = $slack_client->getStarsForUser(10, 1, 'U04MHA1TE');

if(isset($result)){
	var_dump($result);
}

echo '</pre>';

?>