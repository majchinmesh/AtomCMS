<?php
	
	if( isset($_POST['submitted']) == 1 ){
		
		$title = mysqli_real_escape_string($dbc, $_POST['title']) ;
		$lable = mysqli_real_escape_string($dbc, $_POST['lable']) ;
		$slug = mysqli_real_escape_string($dbc, $_POST['slug']) ;
		$header = mysqli_real_escape_string($dbc, $_POST['header']) ;
		$body = mysqli_real_escape_string($dbc, $_POST['body']) ;


		if($_POST['update']!=''){
			$action = "Updated";
			$q = "UPDATE pages SET title = '$title' , header = '$header', slug='$slug', body='$body',lable='$lable', user_id = $_POST[user_id]  WHERE id = $_GET[id]";
			
		}else{
			$action = "Added";
			$q = "INSERT INTO pages (`user_id`,`title`,`slug`, `lable`,`header`,`body`) VALUES ($_POST[user_id] ,'$title','$slug','$lable','$header','$body')" ;
		}
		$r = mysqli_query($dbc, $q);
		
		if ($r){
			$message = "<p>Page was ".$action."</p>" ;
		}else {
			$message = "<p>Page could not be ".$action." because:".mysqli_error($dbc)."'</p>" ;
			$message .= '<p>'.$q.'</p>';								
		}		


	}
					
?>