<?php

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