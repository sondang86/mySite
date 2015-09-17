<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */
$byline = sprintf(
        esc_html_x('%s', 'post author', '_s'), '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
);

$day = get_the_date('l');
$month = get_the_date('F');
$date = get_the_date('j');
$year = get_the_date('Y');

$post_link = wp_get_shortlink();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><div class="entry-title"><?php the_title(); ?></div></a>

        <div class="entry-meta">

            <span class="posted-on-by"><i class="fa fa-user"><?php echo $byline; ?></i></span>
            <a href="#" title="<?php echo $day . ', ' . $month . '/' . $date . '/' . $year ?>"><span class="posted-on-clock"><i class="fa fa-clock-o">&nbsp;</i><?php the_time(); ?></span></a>
            <span class="posted-on-folder"><i class="fa fa-folder-o">&nbsp;</i><?php echo get_the_category_list(esc_html__(', ', '_s')); ?></span>
            <span class="posted-on-comment"><i class="fa fa-comment-o">&nbsp;</i><a href="#respond"><?php comments_popup_link('Leave a comment', '1 comment', 'comments'); ?></a></span>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
    <div class="row">

        <div class="entry-content">
            <div class="medium-12 columns">
                   
            <div class="content-single">
                <?php the_content(); ?>
            </div>
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', '_s'),
                'after' => '</div>',
            ));
            ?>
</div>
        </div><!-- .entry-content -->
    </div>
    <div class="row">
        <div class="medium-12 columns">
            <footer class="entry-footer">
                <div class="social_share"><?php social_share();?></div>
                <div class="facebook_like"><?php facebook_like(get_the_permalink());?></div>
                <div class="tagged-list">
                    <?php get_tagged_list() ?>
                </div>
            </footer><!-- .entry-footer -->
        </div>
    </div>
</article><!-- #post-## -->

