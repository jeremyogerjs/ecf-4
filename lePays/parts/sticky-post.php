<?php 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            if( 1 == $paged):
        ?>
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
                        <div class="col-sm-3 d-flex justify-content-center">
                            <a href="<?php echo get_permalink($post_item['ID']) ?>">
                                <?php echo get_the_post_thumbnail($post_item['ID'], 'medium'); ?>
                            </a>
                        </div>
                        <div class="col-sm-8 d-sm-flex align-items-sm-center mx-sm-auto">
                            <div class="card-body">
                                <h4 class="card-title"><a class="text-decoration-none link-dark" href="<?php the_permalink() ?>"> <?php echo $post_item['post_title'] ?> </a></h4>
                                <h5 class="card-subtitle"><?php the_author();  ?></h5>
                            
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
                        
                    </div>  
                </article>
            <?php endforeach; ?> 
        <?php endif; ?>