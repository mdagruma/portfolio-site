<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="date=no, address=no, email=no, url=no" />
        <title>
            <?php
				// This pulls the Site Title name from the General Settings.			
                wp_title(' ', true, 'right');
            ?>
        </title>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
        
        <!-- favicon -->
        <link rel="shortcut icon" type="image/ico" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
    	
        <!-- Responsive Stylesheets -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style-responsive.css" type="text/css" media="all" />
    </head>
    
    <body <?php body_class(); ?>>   
        <main>
            <header>
            	<!-- This is an animated mobile hamburger menu icon. Feel free to use it. -->         
                <div class="btn-mobile-menu">
                    <span class="btn-mobile-icon"><i></i></span>     
                </div>
            </header>
  
            <!--           
            	You'll see there are two navigation menus. You can create as many as you want in the WordPress backend. The PHP code below tells WordPress which menu to load where.
            	Menus are "registered" in the functions.php file. You create navigation in the WordPress backend under Appearance > Menus 
             -->
            
            <nav class="desktop-menu">
				<?php wp_nav_menu(array('theme_location' => 'main-nav')); ?>
            </nav>
            <nav class="mobile-menu">
                <?php wp_nav_menu(array('theme_location' => 'main-nav')); ?>
            </nav>
            
        <!-- 
        	You don't need to close the body tag or main tag in this file. These are closed in the footer.php file. 
            If your website is a sandwich, the header file is the top piece of bread. The footer is the bottom piece. 
        -->    