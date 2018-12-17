<?php 
    /* Template Name: Home */ 
	// The line above is how you tell give your pages a template name that can be used in the Page Attributes section of the page you're working on. 
	
	// The line below tells WordPress to display the contents of your header.php file.
    get_header(); 
?>

    <header class="hero">
        <h1>
		<?php 
			// This is how you insert PHP within your HTML. Think of opening and closing PHP like you would an HTML tag. It has an opening and a closing. Everything inside is pure PHP.
			
			// The Title: The code below tells WordPress to insert the title of your page in this spot.
			the_title(); 
		?>
        </h1> 
    </header> 
    <section>
    <?php
	
		// The conditional statement below is the usual way to tell WordPress where to display content from the WYSIWIG/text editor on the page. It's also the most basic "loop" used.
		// This is where we'll start using the word "query." Query basically means, "I'm asking if you have this."
		
    	if (have_posts()) { // This line says: "If the current page has results to loop over ... "
        	while (have_posts()) { // If the first line is "true," begin looping over the code below until there's nothing left.
            	the_post(); // Checks if the loop has started
                
				// The Content: This tells WordPress to insert the code in the text editor from your page here.
				the_content();
				
			} // Ends the while statement.	
		} // Ends the if statement.
    ?>
	</section>    

<?php  
	// The line below tells WordPress to display the contents of your footer.php file.       
	get_footer(); 
?>