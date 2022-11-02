<?php 

function subscribe($list_ID, $email, $name){
	$auth = array('api_key' => '2fd5e02e07442922fc26cfc86e329e96');

	$wrap = new CS_REST_Subscribers($list_ID, $auth);
	$result = $wrap->add(array(
	    'EmailAddress' => $email,
    	'Name' => $name,
	    'Resubscribe' => true
	));

	return $result;
}

function unsubscribe($list_ID, $email){
	$auth = array('api_key' => '2fd5e02e07442922fc26cfc86e329e96');

	$wrap = new CS_REST_Subscribers($list_ID, $auth);
	$result = $wrap->unsubscribe($email);

	return $result;
}

?>