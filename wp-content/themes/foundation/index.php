<?php
    get_header();
    
?>
<div class="panel featured dropshadow">
    <div class="row">
        <div class="large-12 columns">
            <h1>Built with the magic of Foundation</h1>

<!--            <div class="row">
                <div class="large-4 medium-4 columns">
                    <i class="fi-html5 main"></i>
                    <h3><a href="http://foundation.zurb.com/docs">Coded with HTML5</a></h3>
                </div>
                <div class="large-4 medium-4 columns">
                    <i class="fi-css3 main"></i>
                    <h3><a href="http://github.com/zurb/foundation">Styled with CSS3</a></h3>
                </div>
                <div class="large-4 medium-4 columns">
                    <i class="fi-torsos main"></i>
                    <h3><a href="http://twitter.com/foundationzurb">Presented by @treehouse</a></h3>
                </div>
            </div>        -->
        </div>
    </div>

</div>





<div class="row">
    <div class="large-8 medium-12 columns"> <!-- Main Content Left -->
        
        <?php get_template_part('content')?>
        
    </div>    <!-- Main Content Left END--> 
    <?php get_sidebar()?>
    


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