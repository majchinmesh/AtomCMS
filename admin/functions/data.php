<?php

	function data_setting_value($dbc,$id){
	
		$q = "SELECT * FROM settings WHERE id = '$id'" ;
		$r = mysqli_query($dbc, $q);
		
		$debug = mysqli_fetch_assoc($r);
		
		return $debug['value'];
	}


	function data_user($dbc , $user_ID){
		
		if (is_numeric($user_ID)) {
			
			$q = "SELECT * FROM users WHERE id = '$user_ID'" ;
		}
		else {
			
			$q = "SELECT * FROM users WHERE email_id = '$user_ID'" ;	
			
		}
		
		
		$r = mysqli_query($dbc, $q);
		$data = mysqli_fetch_assoc($r) ;
		$data['fullname'] = $data['first_name'].' '.$data['last_name'] ;
		$data['fullname_reverse'] = $data['last_name'].', '.$data['first_name'] ;
		return $data;
	}


	function data_page($dbc,$page_ID){
		
		$q = "SELECT * FROM pages WHERE id = $page_ID";
		$r = mysqli_query($dbc, $q) ;
		$data = mysqli_fetch_assoc($r);
		
		$data['noHTML_body'] = strip_tags($data["body"]);
		
		if ( $data['noHTML_body'] == $data['body'] ){
			$data['formated_body'] = "<p>".$data['noHTML_body']."</p>";
		}
		else {
			$data['formated_body'] = $data['body'];
		}
		
		return $data;	
	}


?> 