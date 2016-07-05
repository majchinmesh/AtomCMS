<?php include("functions/template.php"); ?>

<nav class="navbar navbar-default" role="nevigation">
	
	<?php if ($debug == 1){
		echo '<button id= "btn-debug" class="btn btn-default"><i class="fa fa-bug fa-2x" ></i></button> ';
	} 
	?>

			
	<ul class="nav navbar-nav">
		<?php
			//nav_main($dbc);	
		?>
		<li><a href="#">Dashboard</a></li>
		<li><a href="#">Pages</a></li>
		<li><a href="#">Users</a></li>
		<li><a href="#">Settings</a></li>
		
	</ul>	


</nav> <!--END OF MAIN NEVIGATION -->
	