<form role="search" class="search-form" action="<?php echo esc_url(home_url('/'));?>">
 <div>
  <label class="sr-only"><?php esc_html_e('Search for', 'govideo');?>:</label>
   <input type="text" name="s" value="" placeholder="<?php esc_attr_e('Search', 'govideo');?>&hellip;">
   <input type="submit" value="<?php esc_attr_e('Search', 'govideo');?>">
  </div>
 </form>