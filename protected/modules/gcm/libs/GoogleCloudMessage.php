<?php

namespace humhub\modules\gcm\libs;

class GoogleCloudMessage {
	var $apiKey = '';
	var $url = '';
	
	function send ($data, $ids)
	{	
		$post = array(
				'registration_ids'  => $ids,
				'data'              => $data,
		);
		$headers = array(
				'Authorization: key=' . $this->apiKey,
				'Content-Type: application/json'
		);
	
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $this->url );
		curl_setopt( $ch, CURLOPT_POST, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $post ) );
	
		$result = curl_exec( $ch );
	
		if ( curl_errno( $ch ) )
		{
			return array(
					'error' => true,
					'result' => 'GCM error: ' . curl_error( $ch )
			);
		}
	
		curl_close( $ch );
		return array(
				'error' => false,
				'result' => $result
		);
	}
}