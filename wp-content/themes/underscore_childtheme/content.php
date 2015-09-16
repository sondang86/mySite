<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

        <?php if ('post' == get_post_type()) : ?>
            <div class="entry-meta">
                <?php _s_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="row">
        <div class="medium-12 columns">
            <div class="entry-content">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('thumbnail');
                }
                the_excerpt();
                ?>

                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', '_s'),
                    'after' => '</div>',
                ));
                ?>
            </div><!-- .entry-content -->
        </div>
    </div>

    <footer class="entry-footer">
        <div class="read-more">
            <a href="<?php echo get_permalink( get_the_ID() );?> " class="button">Read More</a>
        </div>
        <?php entry_meta();?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
