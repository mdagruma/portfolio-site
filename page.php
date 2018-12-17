<?php 
	/* Template Name: Subpage */
	
	// page.php is your main subpage template file. In the backend, you can choose "Subpage" to assign this template to a page under Page Attributes. 
	// If you don't assign a template to a page, it uses "Default Template," and will look for this file. 
	get_header();
?>
     
<section>      
    <div>
        <?php 
            if (have_posts()) { 
                while (have_posts()) { 
                    the_post(); 
                    the_content(); 			
				}
			}
        ?>	
    </div>
</section>  
<?php   
 	get_footer(); 
?>