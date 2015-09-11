<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//if (!is_active_sidebar('sidebar-2')) {
//    return;
//}
?>

<?php if (is_active_sidebar('sidebar-2')): ?>
<div class="medium-4 columns">
    <div id="supplementary">
        <div id="footer-widgets" class="footer-widgets widget-area clear" role="complementary">
            <?php dynamic_sidebar('sidebar-2') ?>
        </div> <!--footer sidebar 2-->
    </div>
</div>
<?php endif;?>

<?php if (is_active_sidebar('sidebar-3')): ?>
    <div class="medium-4 columns">
        <div id="supplementary">
            <div id="footer-widgets" class="footer-widgets widget-area clear" role="complementary">
                <?php dynamic_sidebar('sidebar-3') ?>
            </div> <!--footer sidebar 3-->
        </div>
    </div>
<?php endif; ?>
<?php if (is_active_sidebar('sidebar-4')): ?>
    <div class="medium-4 columns">
        <div id="supplementary">
            <div id="footer-widgets" class="footer-widgets widget-area clear" role="complementary">
                <?php dynamic_sidebar('sidebar-4') ?>
            </div> <!--footer sidebar 4-->
        </div>
    </div>
<?php endif; ?>