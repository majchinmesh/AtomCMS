<?php 
	// all functions 
	include("functions/data.php");
	
	//dbc connection
	include("connection.php");
	
	//constants	
	DEFINE("D_TEMPLATE","template") ;	
	
	$site_title = "AtomCMS" ;
	
	
	// site setup
	$debug = data_setting_value($dbc, 'debug-status');
	
	
	
	
	$page_ID = 'home' ; // set page_ID to default 1 
	if ( isset($_GET['page'])){
		$page_ID = $_GET['page'] ; // set page_ID to the value specified in the URL
	}
	
	
	// Page setup
	$page_data = data_page($dbc,$page_ID) ; 
	

?>
