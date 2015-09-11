<?php
get_header();
//define('WP_USE_THEMES', false);
?>
<div class="row">    
    <?php
    if (is_active_sidebar('sidebar-1')) {
        echo '<div class="medium-8 columns">';
    } else {
        echo '<div class="medium-12 columns">';
    }
    ?>


    <div id="primary" class="content-area">
        <!-- PRELOAD -->
        <div id="ajaxloader" style="display: none"></div>        

        <!-- LOAD SINGLE POST CONTENT IN #TABS -->
        <div id="tabs"></div>
        <main id="main" class="site-main" role="main">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('content', 'single'); ?>
                <div class="post-navigation">
                    <div class="nav-previous"><?php previous_post_link('%link', '<span> Previous </span> %title'); ?></div>
                    <div class="nav-next"><?php next_post_link('%link', '<span>' . 'Next' . '</span> %title'); ?></div>
                </div><!-- .post-navigation -->
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
                <?php
            endwhile; // End of the loop.
            wp_reset_query();
            ?>
        </main><!-- #main -->
    </div><!-- #primary -->

</div>
<div class="medium-4 columns end">
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>