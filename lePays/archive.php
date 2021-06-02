<?php get_header(); ?>
    <h1 class="title text-center py-3"> Bienvenue dans la catégorie <?php single_cat_title(); ?></h1>
    <hr>
    <div class="container clearfix">
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
            <?php endwhile; ?>
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
<?php get_footer(); ?>