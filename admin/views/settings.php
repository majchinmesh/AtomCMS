<h1>Site settings</h1>


<div class="row">
	
	<div class="col-md-2">
	</div>
	
	<div class="col-md-10">
		
		<?php	if (isset($message)){ echo $message ; }?>
		
		<?php 
		
			$q = "SELECT * FROM settings ORDER BY id ASC" ;
			$r = mysqli_query($dbc, $q) ;
			
			while($opened = mysqli_fetch_assoc($r) ){			?>
				
				<form class="form-inline" method="post" action="index.php?page=settings&id=<?php echo $opened['id']?>">
				  
				  <div class="form-group">
				    <label for="id">ID:</label>
				    <input type="text" class="form-control" id="id" <?php echo "value='$opened[id]'" ;?> name = "id" placeholder="ID-name">
				  </div>
				  
				  <div class="form-group">
				    <label for="lable">Lable:</label>
				    <input type="text" class="form-control" id="lable" <?php echo "value='$opened[lable]'" ;?> name = "lable" placeholder="Lable">
				  </div>
				  <div class="form-group">
				    <label for="value">Value:</label>
				    <input type="text" class="form-control" id="value" <?php echo "value='$opened[value]'" ;?> name = "value" placeholder="Value">
				  </div>

				  <input type="hidden" value="1" name="submitted"/> <!--since all input fields will be sent as a post array, submitted will also be sent and it will be set to 1 by default and we can check this later to run the mysql query-->
				  <input type="hidden" value="<?php echo $opened[id]; ?>" name="openedid"/> <!-- if it was actually an update, the ?id witll be having some integer stored in it, i.e. in $_GET['id'] and if it wasnt it will contain nothing-->
				  <button  type="submit" class="btn btn-default">Save</button>

				</form>
				<br>
					
		<?php } ?>
			
	</div> <!-- End of col 12-->
	
</div> <!-- End of row-->


