<?php

	# start the session
	session_start();
	
	if(!isset($_SESSION['user_ID'])){
		
		header('Location: login.php');	
	}
	
?>



<?php 	include('config/setup.php');?>


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
			
			
			<header>
				
				<h1>Admin Dashboard</h1>
				
			</header>
			
			<div class="row">
				
				<div class="col-md-3">
					
					
					<div class="list-group">
						
						<a href="index.php" class="list-group-item ">
						
							<i class="fa fa-plus"></i> New Page
						</a>
					
						<?php 
						
							$q = "SELECT * FROM pages ORDER BY title ASC" ;
							$r = mysqli_query($dbc, $q) ;
							
							while($page_list = mysqli_fetch_assoc($r) ){
								
								$blurd = substr(strip_tags($page_list['body']), 0,60);
						?>
						
								<a href="index.php?id=<?php echo $page_list['id'] ; ?>" class="list-group-item  <?php echo selected($page_list['id'], $opened['id'], "active") ; ?>">
									
									<h4 class="list-group-item-heading"><?php echo $page_list['title'] ; ?></h4>
   									<p class="list-group-item-text"><?php echo $blurd ; ?></p>
						
								</a>
						
						<?php		
							}
						?>
					
					</div> <!-- End class list group-->
					
				</div> <!-- End of col 3-->
				
				<div class="col-md-9">
					<?php
						if (isset($message)){
						
							echo $message ; 
							
						}
					?>
					
					<form method="post" action="index.php?id=<?php echo $opened['id']?>" role="form">
						
						<div class="form-grpup" >
							
							<label for="title">Title:</label>
							<input class="form-control" type="text" name="title" id="title" <?php echo "value='$opened[title]'" ;?> placeholder="Page title" />
							
						</div>	
						
						
						
						<br>
						
						<div class="form-grpup" >
							
							<label for="user_id">user:</label>
							<select class="form-control" name="user_id" id="user_id">
								<option value="0" >No user</option>
								<?php
									
									$q = "SELECT id FROM users ORDER BY first_name ASC";
									$r = mysqli_query($dbc, $q);
									
									while($user_list = mysqli_fetch_assoc($r)){
										$id = $user_list['id'];
										$user_data = data_user($dbc,$id);
										
										
										if ( isset($opened) ){
											$isSelected = selected( $opened['user_id'] , $user_data['id'] , "selected" );
										}else{
											
											$isSelected = selected( $user['id'] , $user_data['id'] , "selected" );
										}
							
													
										echo "<option value='$id'".$isSelected." >$user_data[fullname]</option>";
									
									}									
								?>
								
							</select>
							
						</div>
						
						
						
						<br>
						
						<div class="form-grpup" >
							
							<label for="lable">Lable:</label>
							<input class="form-control" type="text" name="lable" <?php echo "value='$opened[lable]'" ;?> id="lable" placeholder="Page lable" />
							
						</div>
						
						<br>
						
						<div class="form-grpup" >
							
							<label for="slug">Slug:</label>
							<input class="form-control" type="text" name="slug" <?php echo "value='$opened[slug]'" ; ?> id="slug" placeholder="Page slug" />
							
						</div>
						
						<br>
						
						
						<div class="form-grpup" >
							
							<label for="header">Header:</label>
							<input class="form-control" type="text" name="header" id="header" <?php echo "value='$opened[header]'"; ?> placeholder="Page header" />
							
						</div>						
						
						<br>
						
						<div class="form-grpup" >
							
							<label for="body">Body:</label>
							<textarea class="form-control editor"  name="body" rows="8" id="body" placeholder="Page body" ><?php echo $opened[body]; ?></textarea>
							
						</div>	
						
						<br>
						
						<input type="hidden" value="1" name="submitted"/> <!--since all input fields will be sent as a post array, submitted will also be sent and it will be set to 1 by default and we can check this later to run the mysql query-->
						<input type="hidden" value="<?php echo $opened[id]; ?>" name="update"/>
						<button  type="submit" class="btn btn-default">Save</button>
					
					</form>
					
				</div> <!-- End of col 9-->
				
				
			</div> <!-- End of row-->
			
			
			
			
		</div>
		
		<!-- Footer -->
		<?php include(D_TEMPLATE."/footer.php"); ?>
		
		
		<?php  if ($debug == 1 ) include('widgets/debug.php');  ?>
		
	</body>
	
	
</html>