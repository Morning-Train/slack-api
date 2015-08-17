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

// $result = $slack_client->getAllChannels();

// $result = $slack_client->createChannel('test channel');

// $result = $slack_client->getChannelById('C096PG6CE');

// $result = $slack_client->getChannelHistoryById('C096PG6CE');

// $result = $slack_client->renameChannel('C096PG6CE', 'test channel 2');

// $result = $slack_client->setChannelPurpose('C096PG6CE', 'et formål');

// $result = $slack_client->setChannelTopic('C096PG6CE', 'et emne');

// $result = $slack_client->archiveChannel('C096PG6CE');

// $result = $slack_client->unarchiveChannel('C096PG6CE');

// $result = $slack_client->getAllEmoji();

if(isset($result)){
	var_dump($result);
}


$result = $slack_client->getChannelById('C096PG6CE');
if(isset($result)){
	var_dump($result);
}

echo '</pre>';

?>