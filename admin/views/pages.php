<h1>Page Manager</h1>
		

<div class="row">
	
	<div class="col-md-3">
		
		
		<div class="list-group">
			
			<a href="index.php?page=pages" class="list-group-item ">
			
				<i class="fa fa-plus"></i> New Page
			</a>
		
			<?php 
			
				$q = "SELECT * FROM pages ORDER BY title ASC" ;
				$r = mysqli_query($dbc, $q) ;
				
				while($list = mysqli_fetch_assoc($r) ){
					
					$blurd = substr(strip_tags($list['body']), 0,60);
			?>
			
					<div id ="page_<?php echo $list['id'] ;?>" class="list-group-item  <?php echo selected($list['id'], $opened['id'], "active") ; ?>">						
						<h4 class="list-group-item-heading"><?php echo $list['title'] ; ?>
							<span class="pull-right">
								<a href="#" id="btn_<?php echo $list['id'] ;?>" class="btn btn-danger btn-delete-page"><i class="fa fa-trash-o"></i></a>
								<a href="index.php?page=pages&id=<?php echo $list['id'];?>" class="btn btn-default"><i class="fa fa-chevron-right"></i></a>
							</span>
							
						</h4>
						<p class="list-group-item-text"><?php echo $blurd ; ?></p>
			
					</div>
			
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
		
		<form method="post" action="index.php?page=pages&id=<?php echo $opened['id']?>" role="form">
			
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
