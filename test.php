<?php

require 'vendor/autoload.php';

use MorningTrain\SlackApi\SlackApi;

define('SLACK_API_KEY', 'xoxb-14996255168-9sgRGBanmPIh5M0v9USh5W5Z');

$slack_client = new SlackApi(SLACK_API_KEY);

echo '<pre>';

// $result = $slack_client->getAllUsers();

// $result = $slack_client->getUserById('');

// $result = $slack_client->setUserPresence('auto');

// $result = $slack_client->getUserPresenceById('');

// $result = $slack_client->setCurrentUserAsActive();

// $result = $slack_client->getTeam();

// $result = $slack_client->getTeamAccessLogs(10, 2); //Requires admin scope to test

// $result = $slack_client->getStarsForUser(10, 1, '');

// $result = $slack_client->getAllChannels();

// $result = $slack_client->createChannel('test channel');

// $result = $slack_client->getChannelById('CHANNEL_ID');

// $result = $slack_client->getChannelHistoryById('CHANNEL_ID');

// $result = $slack_client->renameChannel('CHANNEL_ID', 'test channel 2');

// $result = $slack_client->setChannelPurpose('CHANNEL_ID', 'et formål');

// $result = $slack_client->setChannelTopic('CHANNEL_ID', 'et emne');

// $result = $slack_client->archiveChannel('CHANNEL_ID');

// $result = $slack_client->unarchiveChannel('CHANNEL_ID');

// $result = $slack_client->getAllEmoji();

// $result = $slack_client->getAllGroups();

// $result = $slack_client->getGroupById('');

// $result = $slack_client->getChannelById('C0EV91NNA');

// $result = $slack_client->postMessage('C0EV91NNA', 'This message was sent by the command', 'U0EVA7H4Y');

if(isset($result)){
	var_dump($result);
}

echo '</pre>';

?>
