<?php
add_theme_support( 'post-thumbnails' );

add_theme_support( 'title-tag' );

add_theme_support('widgets');
function capitaine_remove_menu_pages(){
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'edit-comments.php' );
};

add_action( 'admin_menu', 'capitaine_remove_menu_pages' );

//add assets
function register_assets(){

    //bootstrap CSS
    wp_enqueue_style
    (
        "bootstrap",
        'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css',
    );

    //bootstrap POPPER
    wp_enqueue_script
    (
        "popperBootstrap",
        'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js',
        array(),
        false,
        true
    );
     //bootstrap js
     wp_enqueue_script
     (
         "popperBootstrap",
         'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js',
         array(),
         false,
         true
     );
    //css basic
    wp_enqueue_style
    (
        'pays',
        get_stylesheet_uri(),
        array(),
        '1.0'
    );

    //css custom
    wp_enqueue_style
    (
        'main_pays',
        get_template_directory_uri() . '/css/main.css?v='.time(),// supprimer time en production
        array(),
        '1.0'
    );
};
add_action( 'wp_enqueue_scripts', 'register_assets' );

//walker nav-menu ( intégre les classes bootstrap)
function register_navwalker(){
    require_once get_template_directory() . '/assets/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

//creer l'option menus dans l'admin wp
register_nav_menus( array(
    'main'      => 'Menu Principal',
    'footer'    => 'Bas de page',
));

//offset last post
function exclude_latest_post( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {
		$query->set( 'offset', '1' );
	}
};
add_action( 'pre_get_posts', 'exclude_latest_post', 1 );

add_action('pre_get_posts', 'myprefix_query_offset', 1 );
function myprefix_query_offset(&$query) {

    //Before anything else, make sure this is the right query...
    if ( ! $query->is_home() ) {
        return;
    }

    //First, define your desired offset...
    $offset = 0;
    
    //Next, determine how many posts per page you want (we'll use WordPress's settings)
    $ppp = get_option('posts_per_page');

    //Next, detect and handle pagination...
    if ( $query->is_paged ) {

        //Manually determine page query offset (offset + current page (minus one) x posts per page)
        $page_offset = $offset + ( ($query->query_vars['paged']-1) * $ppp );

        //Apply adjust page offset
        $query->set('offset', $page_offset );

    }
    else {

        //This is the first page. Just use the offset...
        $query->set('offset',$offset);

    }
}

add_filter('found_posts', 'myprefix_adjust_offset_pagination', 1, 2 );
function myprefix_adjust_offset_pagination($found_posts, $query) {

    //Define our offset again...
    $offset = 0;

    //Ensure we're modifying the right query object...
    if ( $query->is_home() ) {
        //Reduce WordPress's found_posts count by the offset... 
        return $found_posts - $offset;
    }
    return $found_posts;
}
//créer l'option widget dans l'admin wp
register_sidebar(array(
    'id'            => 'home-sidebar',
    'name'          => 'Home',
    'before_widget' => '<div class="sidebar %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="title">',
    'after_title'   => '</h5><hr>'
));

//créer l'option widget dans l'admin wp
register_sidebar(array(
    'id'            => 'footer-sidebar',
    'name'          => 'Footer',
    'before_widget' => '<div class="sidebar %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="title">',
    'after_title'   => '</h5><hr>'
));

//créer l'option widget dans l'admin wp
register_sidebar(array(
    'id'            => 'category-sidebar',
    'name'          => 'category',
    'before_widget' => '<div class="sidebar %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="title">',
    'after_title'   => '</h5> <hr>'
));
//pagination
function pagination_bar() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base'      => get_pagenum_link(1) . '%_%',
            'format'    => '/page/%#%',
            'current'   => $current_page,
            'total'     => $total_pages,
            'prev_text' => '<',
            'next_text' => '>'
        ));
    }
};

// cacher la version de wordpress
remove_action("wp_head", "wp_generator");
