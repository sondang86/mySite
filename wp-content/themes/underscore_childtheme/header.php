<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php wp_head(); ?>
        
        <!--GOOGLE ANANYTICS-->
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-67443001-1', 'auto');
            ga('send', 'pageview');
        </script>
        <!--//GOOGLE ANANYTICS-->
        
    </head>
    <body <?php body_class(); ?>>
        <div class="container">
            <div class="row">
                <div id="page" class="hfeed site">
                    <header id="masthead" class="site-header" role="banner">
                        <?php
                        //Check image & text condition
                        if (get_header_image() && !('blank' == get_header_textcolor())) {
                            ?>
                            <div class="site-branding header-background-image" style="background-image: url(<?php header_image(); ?>)">
                            <?php } elseif (get_header_image() && ('blank' == get_header_textcolor())) {
                                ?>
                                <div class="site-branding header-background-image" style="background-image: url(<?php header_image(); ?>)">
                                <?php } elseif (!get_header_image() && !('blank' == get_header_textcolor())) { ?>
                                    <div class="site-branding">    
                                        <?php
                                    } else {
                                        echo '<div class="">';
                                    }
                                    ?>
                                    <?php if (is_front_page() && is_home()) : ?>
                                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                    <?php else : ?>
                                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                                    <?php endif; ?>
                                    <p class="site-description"><?php bloginfo('description'); ?></p>
                                </div><!-- .site-branding --><nav class="top-bar" data-topbar>
                                    <ul class="title-area">
                                        <li class="name"></li>
                                        <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
                                    </ul>
                                    <section class="top-bar-section">
                                        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav-menu left', 'container' => '', 'walker' => new Embassy_Walker_Nav_Menu)); ?>
                                    </section>
                                </nav>
                                </header><!-- #masthead -->
                                <div id="content" class="site-content">
                                    <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
                                        <?php
                                        if (function_exists('bcn_display')) {
                                            bcn_display();
                                        }
                                        ?>
                                    </div>
