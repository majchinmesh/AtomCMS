<h1>User Manager</h1>

<div class="row">
	
	<div class="col-md-3">
		
		
		<div class="list-group">
			
			<a href="index.php?page=users" class="list-group-item ">
			
				<i class="fa fa-plus"></i> New user
			</a>
		
			<?php 
			
				$q = "SELECT * FROM users ORDER BY last_name ASC" ;
				$r = mysqli_query($dbc, $q) ;
				
				while($list = mysqli_fetch_assoc($r) ){
					
					$list = data_user($dbc,$list['id']);
					//$blurd = substr(strip_tags($page_list['body']), 0,60);
			?>
			
					<a href="index.php?page=users&id=<?php echo $list['id'] ; ?>" class="list-group-item  <?php echo selected($list['id'], $opened['id'], "active") ; ?>">
						
						<h4 class="list-group-item-heading"><?php echo $list['fullname_reverse'] ; ?></h4>
						<!-- <p class="list-group-item-text"><?php echo $blurd ; ?></p> -->
			
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
		
		<form method="post" action="index.php?page=users&id=<?php echo $opened['id']?>" role="form">
			
			<div class="form-grpup" >
				
				<label for="first_name">First name:</label>
				<input class="form-control" type="text" name="first_name" id="first_name" <?php echo "value='$opened[first_name]'" ;?> placeholder="First name" />
				
			</div>	
			
			<br>
			
			<div class="form-grpup" >
				
				<label for="last_name">Last name:</label>
				<input class="form-control" type="text" name="last_name" id="last_name" <?php echo "value='$opened[last_name]'" ;?> placeholder="Last name" />
				
			</div>	
			
			
			
			<br>
			
			<div class="form-grpup" >
				
				<label for="status">status:</label>
				<select class="form-control" name="status" id="status">
					<option value="0"  <?php if(isset($_GET['id'])){ echo selected( $opened['status'] ,'0' , "selected" ); }?>   >Inactive</option>
					<option value="1"  <?php if(isset($_GET['id'])){ echo selected( $opened['status'] ,'0' , "selected" ); }?>   >Active</option>
							
				</select>
				
			</div>
			
			<br>
			
			<div class="form-grpup" >
				
				<label for="email_id">Email id:</label>
				<input class="form-control" type="text" name="email_id" <?php echo "value='$opened[email_id]'" ;?> id="email_id" placeholder="Email id" />
				
			</div>
			
			<br>
			
			<div class="form-grpup" >
				
				<label for="password">Password:</label>
				<input class="form-control" type="password" name="password" value="" id="password" placeholder="Password" />
				
			</div>
			
			<br>
			
			<div class="form-grpup" >
				
				<label for="password2">Reenter Password:</label>
				<input class="form-control" type="password" name="password2" value="" id="password2" placeholder="Reenter Password" />
				
			</div>
			
			
			<br>
			
			<input type="hidden" value="1" name="submitted"/> <!--since all input fields will be sent as a post array, submitted will also be sent and it will be set to 1 by default and we can check this later to run the mysql query-->
			<input type="hidden" value="<?php echo $opened[id]; ?>" name="update"/> <!-- if it was actually an update, the ?id witll be having some integer stored in it, i.e. in $_GET['id'] and if it wasnt it will contain nothing-->
			<button  type="submit" class="btn btn-default">Save</button>
		
		</form>
		
	</div> <!-- End of col 9-->
	
	
</div> <!-- End of row-->