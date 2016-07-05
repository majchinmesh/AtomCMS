<?php

	# start the session
	session_start();
	
	if(!isset($_SESSION['username'])){
		
		header('Location: login.php');	
	}
	
?>



<?php 	include('config/setup.php');?>


<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $page_data['title']." | ".$site_title; ?></title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php  include('config/css.php'); ?>
		
		<?php include('config/js.php'); ?>
				
	</head>
	
	<body>
		<div id="wrap" >
				
			<!-- Nevigation -->
	
			<?php include(D_TEMPLATE."/nevigation.php"); ?>
			
			
			<header>
				
				<h1>Admin Dashboard</h1>
				
			</header>
			
			
			
		</div>
		
		<!-- Footer -->
		<?php include(D_TEMPLATE."/footer.php"); ?>
		
		
		<?php  if ($debug == 1 ) include('widgets/debug.php');  ?>
		
	</body>
	
	
</html>