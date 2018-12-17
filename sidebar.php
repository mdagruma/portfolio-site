<?php 
	// If you wanted to add a sidebar to your site, you'd use this file. Otherwise, it just needs to be in your main directory.
	if (is_active_sidebar('general_sidebar')) { 
?>
        <div id="sidebar" class="sidebar widget-area">
            <?php dynamic_sidebar('general_sidebar'); ?>
        </div>   
<?php 
	} 
?>