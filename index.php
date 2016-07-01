<?php 	include('config/setup.php'); ?>


<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $page_data['title']." | ".$site_title; ?></title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php  include('config/css.php'); ?>
		
		<?php include('config/js.php'); ?>
				
	</head>
	
	<body>
	<div id="wrap" >
			
		<!-- Nevigation -->

		<?php include(D_TEMPLATE."/nevigation.php"); ?>
		
		
		<header class="container">
			
			<h1>  <?php echo $page_data['header']  ?>  </h1>
			
		</header>
		
		
		
		
		<!-- Body -->
		<div class="container">
			<?php echo $page_data['formated_body'] ?>
		</div>
		
		
		
	</div>
		<!-- Footer -->
		<?php include(D_TEMPLATE."/footer.php"); ?>
		
		
		<div id="console-debug">
			
			<pre>
				<?php print_r($page_data); ?>
			</pre>
	
		</div>
		
		
	</body>
	
	
</html>