<?php

	# start the session
	session_start();
	
	if(!isset($_SESSION['user_ID'])){
		
		header('Location: login.php');	
	}
	
?>



<?php 	include('config/setup.php');?>


<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $page." | ".$site_title; ?></title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php  include('config/css.php'); ?>
		
		<?php include('config/js.php'); ?>
				
	</head>
	
	<body>
		<div id="wrap" >
				
			<!-- Nevigation -->
	
			<?php include(D_TEMPLATE."/nevigation.php"); ?>
			