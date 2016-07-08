<?php 	
	
	// start session
	session_start();

	//dbc connection
	include("../config/connection.php");
	
	if ($_POST){
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		
		$q = "SELECT 'password' FROM users WHERE email_id = '$email' AND password = sha1('$password')" ; 
		$r = mysqli_query($dbc, $q);
		
		if (mysqli_num_rows($r) == 1 ){
			
			$_SESSION['user_ID'] = $email ;
			header('Location: index.php');
		}
		
	}
	
	
 ?>


<!DOCTYPE html>
<html>
	<head>
		<title>Login | AtomCMS</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php  include('config/css.php'); ?>
		
		<?php include('config/js.php'); ?>
				
	</head>
	
	<body>
		<div id="wrap" >
			<!-- Nevigation -->
			<?php // include(D_TEMPLATE."/nevigation.php"); ?>
			<div class="container">
					
				<div class="row">
				
					<div class="col-md-4 col-md-offset-4">
						
						<div class="panel panel-info">
							
							<div class="panel-heading"><h3>Login</h3></div>
							
							<div class="panel-body">
						
								<form action="login.php" method="post" role="form">
									
								  <div class="form-group">
								    <label for="exampleInputEmail1">Email address</label>
								    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
								  </div>
								  
								  <div class="form-group">
								    <label for="exampleInputPassword1">Password</label>
								    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
								  </div>
							
								<!--	  
								  <div class="checkbox">
								    <label>
								      <input type="checkbox"> Check me out
								    </label>
								  </div>
								-->
								  
								  <button type="submit" class="btn btn-default">Submit</button>
							
								</form>
								
							</div><!-- END panel-body -->
						</div>	<!-- END panel -->
					</div> <!-- END column -->
				</div> <!-- END row -->
			</div>	<!-- END container -->
		</div>	<!-- END wrap -->
		
		<!-- Footer -->
		<?php // include(D_TEMPLATE."/footer.php"); ?>
		
		
		<?php //  if ($debug == 1 ) include('widgets/debug.php');  ?>
		
	</body>
	
	
</html>