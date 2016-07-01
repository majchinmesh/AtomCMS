<?php include("functions/template.php"); ?>

<nav class="navbar navbar-default" role="nevigation">

	<button id= "btn-debug" class="btn btn-default"><i class="fa fa-bug fa-2x" ></i></button>

	<div class="container">
		
		<ul class="nav navbar-nav">
			<?php
				nav_main($dbc);	
			?>
			
		</ul>	

	</div>

</nav> <!--END OF MAIN NEVIGATION -->
	