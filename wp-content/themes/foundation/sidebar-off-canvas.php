
      <aside class="left-off-canvas-menu">
        <ul class="off-canvas-list">
            <?php
                $args = array(
                    'theme-location' => 'canvas-off',
                    'items_wrap'      => '%3$s',
                    'container'       => '',
                );

                wp_nav_menu($args);
            ?>
        </ul>
     </aside>