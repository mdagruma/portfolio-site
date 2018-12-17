<?php 
    /* Template Name: Blog Post */
	
	// single.php is your main blog post template file.
	// If you have a blog, WordPress will look for this file to display post content. It works similarly to page.php
	 
    get_header(); 
?>
<section>
	<div>
        <h1><?php the_title(); ?></h1>
	</div>
</section>
<?php
	get_footer(); 
?>