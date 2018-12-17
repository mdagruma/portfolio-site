<?php 
	/* Template Name: Site Map */ 
	
	// This is an example of a template that you can create on your own. WordPress doesn't include a site map, so you need to make one on your own. 	
	get_header(); 
?>
<section>
	<div>
    	<!-- 
        	Some WordPress templates and pages can't use the_title(); - In this case, you need to manually type in your h1.
            Here is a list of pages that won't accept it:
            
            - index.php
            - 404.php (Your custom error page)
            - a template with a site map
        
        -->     
    	<h1>Site Map</h1>
    </div>      
    <div>
        <ul>
            <?php
				// wp_list_pages lists every page on your site in a list. It's what you can use to create a sitemap or sidebar navigation.			
                wp_list_pages(
                    array(
                        // Exclude Pages
                        // IDs:
                        
                        // 20 - Contact - Thank You
                        // 21 - Privacy Policy
                        // 22 - Site Map
                        // 24 - Website Style Guide
                        
                        'exclude' => '20, 21, 22, 23, 24, 26',
                        'title_li' => '',
                    )
                );
            ?>
        </ul>
    </div> 
</section>          
<?php 
	get_footer(); 
?>