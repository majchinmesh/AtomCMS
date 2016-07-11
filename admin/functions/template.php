<?php 

	function nav_main($dbc){
		$q = "SELECT * FROM pages";
		$r = mysqli_query($dbc, $q);
		
		while( $nav = mysqli_fetch_assoc($r) ){ 
				
			$page_id =  $nav['id'];
			$page_title = $nav['lable'];
			
			$active_page = 1 ;
			if ( isset($_GET['page'])){
				$active_page = $_GET['page'] ;
			}
		?>
			<li<?php if($page_id == $active_page ) echo(' class="active"') ?> > <a href="?page=<?php echo $page_id ?>"><?php echo $page_title ?></a></li>	
				
	
	<?php		
					
		}
				
	}


?>