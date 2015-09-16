<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>

    <?php wp_head();?>


  </head>
  <body <?php body_class()?>>
  
  <!-- OFF CANVAS FOUNDATION NAVIGATION -->  
  
  <div class="off-canvas-wrap"> 
    <div class="inner-wrap">
      <nav class="tab-bar">
        <section class="left-small">
          <a href="#" class="left-off-canvas-toggle menu-icon"><span></span></a>
        </section>

        <section class="middle tab-bar-section">
            <h1 class="title"><i class="fi-social-treehouse large"></i> <a href="<?php bloginfo('url')?>">Tree-Foundation</a></h1>
        </section>
      </nav>

     
    <?php get_sidebar('off-canvas')?>
