<?php 

	error_reporting(0);

	//dbc connection
	include("../config/connection.php");
 
	// all functions 
	include("functions/data.php");
	
	// other functions 
	include('functions/sendbox.php');

	//constants	
	DEFINE("D_TEMPLATE","template") ;	
	
	$site_title = "AtomCMS" ;
	
	
	// site setup
	$debug = data_setting_value($dbc, 'debug-status');
	
	
	
	
	$page = 'dashboard' ; // set page to default 'dashboard' 
	if ( isset($_GET['page'])){
		$page = $_GET['page'] ; // set page_ID to the value specified in the URL
	}
	
	
	// Page setup
	include("config/quries.php");

	
	

	// user setup 
	$user_ID = $_SESSION['user_ID'];
	$user = data_user($dbc,$user_ID);	

?>
