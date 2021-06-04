<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,500;0,700;1,300&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="header entete">
  <div class="w-75 mx-auto d-flex justify-content-center text-center">
    <nav class="navbar navbar-expand-lg ">
      
      <a class="navbar-brand " href="<?php echo home_url( '/' ); ?>">
        <img class="d-inline-block align-text-middle" width="50" height="50" src="<?php echo get_template_directory_uri(); ?>/assets/img/palm-tree.svg" alt="Le pays">
        Le pays  
      </a> 
      
      <?php wp_nav_menu( 
        array(
          'theme_location'  => 'main',
          'depth'           => '2',
          'container'       => 'div',
          'container_class' => 'collapse navbar-collapse d-flex flex-start',
          'container_id'    => 'bs-example-navbar-collapse-1',
          'menu_class'      => 'nav navbar-nav mx-auto',
          'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
          'walker'          => new WP_Bootstrap_Navwalker(), 
  
        )); 
      ?>
      
      
    </nav> 
  </div>
</header>


<?php wp_body_open(); ?> 