<div class="top-footer">
			<ul class="footer-social list-inline">
            <?php
			$footer_top_icons = govideo_option('footer_top_icons');
			foreach($footer_top_icons as $item){

					$icon  = $item['icon'];
					$link  = $item['link'];
					$title = $item['title'];
					?>
				<li><a target="_blank" href="<?php echo esc_url($link);?>"><i class="fa <?php echo esc_attr($icon);?>"></i> <span><?php echo esc_attr($title);?></span></a></li>
                <?php }?>
			</ul>  
		</div>