<div id="sidebar" class="col-md-4">
  <?php
  
	if( is_page() ){
		$sidebar = 'hoo-sidebar-page';
	}elseif( is_archive() || is_category() || is_search() ){
		  
		$sidebar = 'hoo-sidebar-archive';
		
	}elseif( is_front_page() ){
		$sidebar = 'hoo-sidebar-home';
	}else{
		$sidebar = 'hoo-sidebar-post';
	}
	
	$sidebar = apply_filters('hoo_sidebar',$sidebar);

	  if ( is_active_sidebar( $sidebar ) ) {
		   dynamic_sidebar( $sidebar );
	  }else{

		  if ( is_active_sidebar( 'sidebar-1' ) ) {
			  dynamic_sidebar( 'sidebar-1' );
		  }
	  
	  }

  ?>
</div>
