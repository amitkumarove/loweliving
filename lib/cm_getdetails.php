<?php
	// $cm_email = '';
	// $noemail = false;

	// if(isset($_GET['e'])){
	// 	$cm_email = urldecode($_GET['e']);
	// }else{
	// 	$noemail = true;
	// }

	// require_once 'cm_auth.php';
	// require_once 'createsend/csrest_subscribers.php';

	// $states = array();

	// $list_count = 0;
	// $invalid_count = 0;

	// foreach ($lists as $title => $list_id_array) {
	// 	foreach ($list_id_array as $key => $list_id) {
	// 		$list_count++;

	// 		$wrap = new CS_REST_Subscribers($list_id, $auth);

	// 		$invalid_status = false;

	// 		if(isset($wrap->get($cm_email)->response)){
	// 			if(isset($wrap->get($cm_email)->response->Code)){
	// 				if($wrap->get($cm_email)->response->Code !== 203){
	// 					$invalid_status = true;
	// 				}
	// 			}

	// 			if(isset($wrap->get($cm_email)->response->State)){
	// 				if($wrap->get($cm_email)->response->State !== 'Active'){
	// 					$invalid_status = true;
	// 				}
	// 			}
	// 		}

	// 		if(!$invalid_status){
	// 			$states[$list_id] = $wrap->get($cm_email)->response->State;
	// 		}else{
	// 			$states[$list_id] = 'Invalid';
	// 			$invalid_count++;
	// 		}
	// 	}
	// }

	// if($invalid_count == $list_count){
	// 	$noemail = true;
	// }

?>