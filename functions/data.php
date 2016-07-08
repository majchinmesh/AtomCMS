<?php

	function data_setting_value($dbc,$id){
	
		$q = "SELECT * FROM settings WHERE id = '$id'" ;
		$r = mysqli_query($dbc, $q);
		
		$debug = mysqli_fetch_assoc($r);
		
		return $debug['value'];
	}



	function data_page($dbc,$page_ID){
		
		if(is_numeric($page_ID)){
			
			$cond = "WHERE id = $page_ID";
			
		}else {
			
			$cond = "WHERE slug = '$page_ID'";
		}
		
		$q = "SELECT * FROM pages ".$cond ;
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