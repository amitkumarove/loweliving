<?php 

function cm_update_preferences() {
	require 'createsend/csrest_subscribers.php';
	require 'cm_lists.php';
	require 'cm_update.php';

	$email = urldecode($_POST['email']);

	$name = urldecode($_POST['name']);

	$formdata = $_POST['formdata'];


	$formdata = json_decode(stripslashes($formdata));

	$lists_to_process = array(); // which lists to sub/unsub from (ALWAYS UNSUBBING FOR NOW)

	$subresults = [];

	foreach ($formdata as $key => $list) {
		switch($list->name){
			case 'lowe':
			case 'pescar':
			case 'alamer':
			case 'lasal':
			case 'lumiere':
			case 'azura':
				if($list->value == 'subscribe'){
					$lists_to_sub[] = $list->name;
				}
				if($list->value == 'unsubscribe'){
					$lists_to_unsub[] = $list->name;
				}
				break;
			case 'unsuball':
				if($list->value == 'unsubscribe'){
					$lists_to_unsub[] = 'projects'; // unsubscribe from all does 'Lowe Group General'
				}	
			default:
				break;
		}
	}

	foreach ($lists as $key => $list) {

		// unsubscribe from some
		if(in_array($key, $lists_to_unsub)){
			$list_id = $list['id'];
			$subresults[] = unsubscribe($list_id, $email, $name)->http_status_code;
		}

		// subscribe to others
		if(in_array($key, $lists_to_sub)){
			$list_id = $list['id'];
			$subresults[] = subscribe($list_id, $email, $name)->http_status_code;
		}
	}

	$success = false;
	for($i=0; $i < count($subresults); $i++){
		if($subresults[$i] == 201 || $subresults[$i] == 200){
			$success = true;
		}
	}

	if(!$success){
		$error_messages = 'Email: '.$email.'<br/>';
		$error_messages .= 'Name: '.$name.'<br/>';
		$error_messages .= 'Lists To Sub: '.print_r($lists_to_sub, true).'<br/>';
		$error_messages .= 'Lists To Un Sub: '.print_r($lists_to_unsub, true).'<br/>';
		$error_messages .= 'Sub Results: '.print_r($subresults, true).'<br/>';
		wp_mail('lc.yourtemporary@gmail.com','Lowe Subscription Error', $error_messages, array('Content-Type: text/html; charset=UTF-8'));
	}

	echo $success;

	exit();
}
add_action('wp_ajax_nopriv_cm_update_preferences', 'cm_update_preferences');
add_action('wp_ajax_cm_update_preferences', 'cm_update_preferences');