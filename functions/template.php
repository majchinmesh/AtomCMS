<?php 

	function nav_main($dbc,$path){
		$q = "SELECT * FROM pages";
		$r = mysqli_query($dbc, $q);
		
		while( $nav = mysqli_fetch_assoc($r) ){ 
				
			$page_slug =  $nav['slug'];
			$page_title = $nav['lable'];
			
			
		?>
			<li <?php selected($path['call_parts'][0] , $page_slug , 'class="active"'); ?> > <a href="<?php echo $page_slug ?>"><?php echo $page_title ?></a></li>	
				
	
	<?php		
					
		}
				
	}


?>