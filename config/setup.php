<?php 

	error_reporting(0);

	// all functions 
	include("functions/data.php");
	include("functions/sendbox.php");
	
	//dbc connection
	include("connection.php");
	
	//constants	
	DEFINE("D_TEMPLATE","template") ;	
	
	$site_title = "AtomCMS" ;
	
	
	// site setup
	$debug = data_setting_value($dbc, 'debug-status');
	
	
	$path = get_path();
	
	
	 
	if ( !isset($path['call_parts'][0]) || $path['call_parts'][0] ==''   ){
			
		$path['call_parts'][0] = 'home' ;
		header("Location: home");	
			
	}
	
	
	// Page setup
	$page_data = data_page($dbc,$path['call_parts'][0]) ; 
	

?>
