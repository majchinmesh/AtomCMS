<?php 

	error_reporting(0);

	//dbc connection
	include("../config/connection.php");
 
	// all functions 
	include("functions/data.php");

	//constants	
	DEFINE("D_TEMPLATE","template") ;	
	
	$site_title = "AtomCMS" ;
	
	
	// site setup
	$debug = data_setting_value($dbc, 'debug-status');
	
	
	
	
	$page_ID = 1 ; // set page_ID to default 1 
	if ( isset($_GET['page'])){
		$page_ID = $_GET['page'] ; // set page_ID to the value specified in the URL
	}
	
	
	// Page setup
	$page_data = data_page($dbc,$page_ID) ;
	
	
	
	if(isset($_GET['id'])){
		$opened = data_page($dbc,$_GET['id']);	
	}
	
	
	// user setup 
	$user_ID = $_SESSION['user_ID'];
	$user = data_user($dbc,$user_ID);	

?>
