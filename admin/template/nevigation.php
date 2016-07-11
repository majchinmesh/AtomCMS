<?php include("functions/template.php"); ?>

<nav class="navbar navbar-default" role="nevigation">
			
	<ul class="nav navbar-nav">
		<?php
			//nav_main($dbc);	
		?>
		<li><a href="#">Dashboard</a></li>
		<li><a href="#">Pages</a></li>
		<li><a href="#">Users</a></li>
		<li><a href="#">Settings</a></li>
		
	</ul>	

	<div class="pull-right">
		<ul class="nav navbar-nav">
			
			<li>
					<?php if ($debug == 1){
						echo '<button type="button" id= "btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug" ></i></button> ';
						} 
					?>
			</li>
			
			<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user['fullname']; ?><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="logout.php">Logout</a></li>
	          </ul>
	        </li>
			
			
		</ul>
	</div> <!--end of pull right div-->

</nav> <!--END OF MAIN NEVIGATION -->
	