<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class SlackApi {
	
	protected $api_token = '';
	
	protected $client;
	
	public function __construct($api_token) {
		$this->api_token = $api_token;
		$this->client = new Client([
			'base_uri' => 'https://slack.com/api/'
		]);		
	}
	
	private function GET($endpoint, $args = array()){		
		try  {
			$args['token'] = $this->api_token;
			//$endpoint .= '?token='.$this->api_token;
			$response = $this->client->get($endpoint, ['query' => $args]);
			return $this->checkResponse($response);
		} catch (ClientException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	
	private function POST($endpoint, $args = array()){		
		try {
			$args['token'] = $this->api_token;
			$response = $this->client->post($endpoint, ['body' => ($args)]);
			return $this->checkResponse($response);
		} catch (ClientException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	
	private function PUT($endpoint, $args = array()){		
		try {
			$args['token'] = $this->api_token;
			$response = $this->client->put($endpoint, ['body' => ($args)]);
			return $this->checkResponse($response);
		} catch (ClientException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	
	private function DELETE($endpoint, $args = array()){		
		try {
			$args['token'] = $this->api_token;
			$response = $this->client->delete($endpoint, ['body' => ($args)]);
			return $this->checkResponse($response);
		} catch (ClientException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	
	private function checkResponse($response) {
		if($response->getStatusCode() == 200) {
			$data = json_decode($response->getBody());
			if(is_object($data) && isset($data->data)){
				$data = $data->data;
			}
			return $data;
		}
		return false;
	}
	
	/* USERS */
	
	public function getAllUsers(){
		return $this->GET('users.list');
	}
	
	public function getUserById($userId){
		return $this->GET('users.info', array('user' => $userId));
	}
	
	public function getUserPresenceById($userId){
		return $this->GET('users.getPresence', array('user' => $userId));
	}
	
	public function setUserPresence($presence = 'auto'){
		if($presence != 'away'){
			$presence = 'auto';
		}
		return $this->GET('users.setPresence', array('presence' => $presence));
	}
	
	public function setCurrentUserAsActive(){
		return $this->GET('users.setActive');
	}
	
	/* TEAM */
	
	public function getTeam(){
		return $this->GET('team.info');
	}
	
	public function getTeamAccessLogs($count, $page){
		return $this->GET('team.accessLogs', ['count' => $count, 'page' => $page]);
	}
	
	/* STARS */
	
	public function getStarsForUser($count, $page, $userId = null){
		$args = ['count' => $count, 'page' => $page];
		if($userId != null){
			$args['user'] = $userId;
		}
		return $this->GET('stars.list', $args);
	}
	
	/* CHANNELS */
	
	public function getAllChannels(){
		return $this->GET('channels.list');
	}
	
	public function getChannelById($channelId){
		return $this->GET('channels.info', array('channel' => $channelId));
	}
	
	public function getChannelHistoryById($channelId, $latest = 'now', $oldest = 0, $inclusive = 1, $count = 100){
		if($latest == 'now'){
			$latest = time();
		}
		return $this->GET('channels.history', [
			'channel' => $channelId,
			'latest' => $latest,
			'oldest' => $oldest,
			'inclusive' => $inclusive,
			'count' => $count
		]);
	}
	
	public function createChannel($channelName){
		return $this->GET('channels.create', array('name' => $channelName));
	}
	
	public function renameChannel($channel, $channelName){
		return $this->GET('channels.rename', array('channel' => $channel, 'name' => $channelName));
	}
	
	public function setChannelPurpose($channel, $purpose){
		return $this->GET('channels.setPurpose', array('channel' => $channel, 'purpose' => $purpose));
	}
	
	public function setChannelTopic($channel, $topic){
		return $this->GET('channels.setTopic', array('channel' => $channel, 'topic' => $topic));
	}
	
	public function archiveChannel($channel){
		return $this->GET('channels.archive', array('channel' => $channel));
	}
	
	public function unarchiveChannel($channel){
		return $this->GET('channels.unarchive', array('channel' => $channel));
	}
	
}

?>