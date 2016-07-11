<?php
	
	switch ($page) {
			
		case 'dashboard':
			
			
			
			break;
			
		case 'pages':
			
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
					$message = "<p class='alert alert-success' >Page was ".$action."</p>" ;
				}else {
					$message = "<p class='alert alert-danger' >Page could not be ".$action." because:".mysqli_error($dbc)."'</p>" ;
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';								
				}		
			}			
			
				
			if(isset($_GET['id'])){
				$opened = data_page($dbc,$_GET['id']);	
			}
			
	


			break;
			
		case 'settings' :
			
			
			break ;

		case 'users' :
			
			if( isset($_POST['submitted']) == 1 ){		
				$first_name = mysqli_real_escape_string($dbc, $_POST['first_name']) ;
				$last_name = mysqli_real_escape_string($dbc, $_POST['last_name']) ;
				$email_id = mysqli_real_escape_string($dbc, $_POST['email_id']) ;
				
				$verify = false ; 
				
				if($_POST['password'] !=''){
					if($_POST['password'] == $_POST['password2'] ){
						 $password = ", password = sha1('$_POST[password]')";
						 $verify = true ;
					}
				}
				
				
				if($_POST['update']!=''){
					$action = "Updated";	
					$q = "UPDATE users SET first_name = '$first_name' , last_name = '$last_name', email_id = '$email_id' , status=$_POST[status] $password  WHERE id = $_GET[id]";
				}else{
					$action = "Added";
					
					if($verify){
						$q = "INSERT INTO users (`first_name`,`last_name`,`email_id`, `status`,`password`) VALUES ('$first_name' ,'$last_name','$email_id',$_POST[status],sha1('$_POST[password]'))" ;
					}
				}
				
				$r = mysqli_query($dbc, $q);	
				if ($r){
					$message = "<p class='alert alert-success' >User was ".$action."</p>" ;
				}else {
					
					$message = "<p class='alert alert-danger' >User could not be ".$action." because:".mysqli_error($dbc)."'and/or</p>" ;
					if(!$verify){
						$message .= '<p class="alert alert-danger" >'.'passwords do not match and/or '.'</p>';
					}	
					$message .= '<p class="alert alert-warning" >Query: '.$q.'</p>';								
				}		
			}			
			
				
			if(isset($_GET['id'])){
				$opened = data_user($dbc,$_GET['id']);	
			}
			

			
			break ;
		
		default:
			
			break;
	}
	
	
	
	
	
	

					
?>