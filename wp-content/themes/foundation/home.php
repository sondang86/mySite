<?php
get_header();
?>
<div class="panel featured dropshadow">
    <div class="row">
        <div class="large-12 columns">
            <h1><a href="<?php bloginfo('url')?>/blog">Blog</a></h1>
        </div>
    </div>

</div>





<div class="row">
    <div class="large-8 medium-12 columns"> <!-- Main Content Left -->

        <?php get_template_part('content', 'blog') ?>

    </div>    <!-- Main Content Left END--> 
    <?php get_sidebar() ?>



</div>
<a href="#" class="exit-off-canvas"></a>


<div class="row">
    <div class="large-12 columns">
        <hr>
        <h4>Latest tweets</h4> <h4 class="subheader">A @treehouse Live workshop on how to create a Wordpress theme with Foundation 5</h4>
        <hr>
    </div>
</div> 
</div>
</div>   <!-- END OFF CANVAS FOUNDATION NAVIGATION -->

<?php
get_footer();
?>