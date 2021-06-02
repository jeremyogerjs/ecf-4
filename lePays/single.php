<?php get_header(); ?>
  <h2>Single</h2>
  <aside class="float-end w-25 m-3 border border-3 rounded p-3">   
          <?php dynamic_sidebar( 'home-sidebar' ); ?>    
  </aside>
  <div class="container col w-75  clearfix">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
      
      <article class="post mx-auto">
        <div class="d-flex justify-content-center">
          <?php the_post_thumbnail('medium_large'); ?>
          </div>

          <h1 class="text-center"><?php the_title(); ?></h1>

          <div class="article__infos d-flex justify-content-center">
            <p class="text-align-middle fst-italic">
              Publié le <?php the_date(); ?>
              par <?php the_author(); ?>
              clasée dans 
              <span class="badge bg-warning rounded-pill ">
                <?php the_category(' &bull; ',""); ?>    
              </span>
            </p>
          </div>
          <div class="w-auto font-monospace">
            <?php the_content(); ?>
          </div>
      </article>
    <?php endwhile; endif; ?>
  </div>
<?php get_footer(); ?>