<?php 
	// all functions 
	include("functions/data.php");

	//constants	
	DEFINE("D_TEMPLATE","template") ;


	// Data base connection
	$dbc = mysqli_connect('sql6.freemysqlhosting.net', 'sql6126040', 'JtyPkXScRc' , 'sql6126040','3306') OR die('Error: '.mysqli_connect_error());
	
	//$dbc2 = mysqli_connect($host, $user, $password, $database, $port, $socket)
	
	//$dbc = mysqli_connect('localhost', 'chinmesh', 'maj992322932710' , 'atomcms') OR die('Error: '.mysqli_connect_error());
	
	
	$site_title = "AtomCMS" ;
	
	
	// site setup
	$debug = data_setting_value($dbc, 'debug-status');
	
	
	
	
	$page_ID = 1 ; // set page_ID to default 1 
	if ( isset($_GET['page'])){
		$page_ID = $_GET['page'] ; // set page_ID to the value specified in the URL
	}
	
	
	// Page setup
	$page_data = data_page($dbc,$page_ID) ; 
	

?>
