<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */
?>

<!--</div>  row-->
</div> <!-- container-->
</div><!-- #content -->

</div><!-- #page -->
</div>
<div class="theme-footer">
    <div class="row">
        <footer id="colophon" class="site-footer" role="contentinfo">
            <?php get_sidebar('footer') ?>        
        </footer><!-- #colophon -->
    </div>
</div> <!-- footer #row-->

<?php wp_footer(); ?>
<script>
    jQuery(document).foundation();
</script>
</body>
</html>
