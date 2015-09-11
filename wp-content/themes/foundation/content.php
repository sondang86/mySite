
<!-- Recent Blog posts -->

<?php if (have_posts()) : while (have_posts()) : the_post() ?>
        <div class="row">
            <div class="large-12 columns" role="content">
                <h1><a href="<?php the_permalink()?>"><?php the_title()?></a></h1>

                <article>
                    <div class="entry">
                        <?php the_content(); ?>
                    </div>
                </article>

                <hr>


            </div>
        </div>  
    <?php endwhile;
endif; 

?>