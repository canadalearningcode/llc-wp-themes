<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package SKT White
 */
?>
<?php if( function_exists('is_woocommerce') && is_woocommerce() ) { ?>
		</div>
<?php } ?>
<div id="sidebar" <?php if( is_page_template('blog-post-left-sidebar.php')){?> style="float:left;"<?php } ?>>
    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside id="archives" class="widget">
            <h3 class="widget-title"><?php _e( 'Archives', 'skt-white' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside id="meta" class="widget">
            <h3 class="widget-title"><?php _e( 'Meta', 'skt-white' ); ?></h3>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>
	
</div><!-- sidebar -->

<?php if( function_exists('is_woocommerce') && is_woocommerce() ) { ?>
		</div>
	</div>
    <div class="clear"></div>
<?php } ?>
