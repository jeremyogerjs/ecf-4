<?php get_header(); ?>
    <p>front-page</p>
    <div class="col-sm-10 m-3 container-fluid mx-auto clearfix"> 
        <h2 class="text-center title">A la une</h2>  
        <?php
            $recent_posts = wp_get_recent_posts(array(
                'numberposts' => 1, // Number of recent posts thumbnails to display
                'post_status' => 'publish' // Show only the published posts
            ));
        foreach( $recent_posts as $post_item ) : 
        ?>
            <article class=" p-2 m-1 sticky-post ">
                <div class="row no-gutters">
                    <div class="col-sm-3">
                        <a href="<?php echo get_permalink($post_item['ID']) ?>">
                            <?php echo get_the_post_thumbnail($post_item['ID'], 'medium'); ?>
                        </a>
                    </div>
                    <div class="col-sm-8 align-middle">
                        <div class="card-body">
                            <h4 class="card-title"><a class="text-decoration-none link-dark" href="<?php the_permalink() ?>"> <?php echo $post_item['post_title'] ?> </a></h4>
                            <h5 class="card-subtitle"><?php the_author();  ?></h5>
                        
                            <div class="article__infos">
                                <div>
                                    <i>
                                        Publié le <?php echo explode(" ",$post_item['post_date'])[0]; ?>
                                    </i>
                                    <br>
                                    <span class="badge">
                                        <?php the_category(' &bull; ',""); ?>    
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>  
            </article>
        <?php endforeach; ?> 
         
        <div class="container clearfix">
            <h2 class="text-center text-uppercase py-3 text-underline">Tous les articles</h2>
            <div class="row row-cols-1 col-sm-8 float-sm-start">
                <?php if(have_posts() ) : while( have_posts() ) : the_post(); ?>
                    <article class="card p-2 col m-1">
                        <div class="row no-gutters">
                            <div class="col-sm-3 article__img">
                                <a href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-body">
                                        <h4 class="card-title"><a class="text-decoration-none link-dark" href="<?php the_permalink() ?>"> <?php the_title(); ?> </a></h4>
                                        <h5 class="card-subtitle"><?php the_author(); ?></h5>
                                </div>
                                <div class="article__infos">
                                    <div>
                                    <i>
                                        Publié le <?php the_time(get_option( 'date_format') ); ?>
                                    </i>
                                        <br>
                                        <span class="badge">
                                            <?php the_category(' &bull; ',""); ?>    
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </article>
                <?php endwhile;  ?>
                <nav class="custom-pagination">
                    <?php pagination_bar(); endif;?>
                </nav>
            </div>
            <div class="d-flex flex-column float-sm-end col-sm-4">
                <aside class="mx-4 p-2">   
                    <?php dynamic_sidebar( 'home-sidebar' ); ?>    
                </aside>
                <aside class="mx-4 p-2">   
                    <?php dynamic_sidebar( 'category-sidebar' ); ?>    
                </aside>
            </div> 
        </div>
    </div>
<?php get_footer(); ?>