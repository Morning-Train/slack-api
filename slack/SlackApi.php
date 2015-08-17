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
			$endpoint .= '?token='.$this->api_token;
			$response = $this->client->get($endpoint, ['body' => json_encode($args)]);
			return $this->checkResponse($response);
		} catch (ClientException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	
	private function POST($endpoint, $args = array()){		
		try {
			$args['token'] = $this->api_token;
			$response = $this->client->post($endpoint, ['body' => json_encode($args)]);
			return $this->checkResponse($response);
		} catch (ClientException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	
	private function PUT($endpoint, $args = array()){		
		try {
			$args['token'] = $this->api_token;
			$response = $this->client->put($endpoint, ['body' => json_encode($args)]);
			return $this->checkResponse($response);
		} catch (ClientException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	
	private function DELETE($endpoint, $args = array()){		
		try {
			$args['token'] = $this->api_token;
			$response = $this->client->delete($endpoint, ['body' => json_encode($args)]);
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
	
	public function getAllUsers(){
		return $this->GET('users.list');
	}
	
}

?>