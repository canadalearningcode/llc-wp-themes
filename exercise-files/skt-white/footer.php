<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT White
 */
?>

<?php if( is_home() || is_front_page() ) { ?>
<section style="background-color:#ffffff;">
            	<div class="container"><h2><?php echo of_get_option('socialtitle',__('We Are Everywhere!','skt-white')) ; ?></h2>
                		<div class="social-icons">
                	<?php if( of_get_option('facebook',true) !=  ''){ ?>
                		<a href="<?php echo esc_url(of_get_option('facebook','#')); ?>" target="_blank"><div class="facebook icon"></div></a>
                    <?php } ?>
                    <?php if( of_get_option('twitter',true) != '') { ?>
                        <a href="<?php echo esc_url(of_get_option('twitter','#')); ?>" target="_blank"><div class="twitt icon"></div></a>
                    <?php } ?>
                    <?php if( of_get_option('gplus',true) != ''){ ?>
                        <a href="<?php echo esc_url(of_get_option('gplus','#')); ?>" target="_blank"><div class="gplus icon"></div></a>
                   	<?php } ?>
                    <?php if( of_get_option('linkedin',true) != ''){ ?>
                    	<a href="<?php echo esc_url(of_get_option('linkedin','#')); ?>" target="_blank"><div class="linked icon"></div></a>
                    <?php } ?>
                    <?php if( of_get_option('pint',true) != ''){ ?>
                    	<a href="<?php echo esc_url(of_get_option('pint','#')); ?>" target="_blank"><div class="pinterest icon"></div></a>
                    <?php } ?>
                    <?php if( of_get_option('youtube',true) != ''){ ?>
                    	<a href="<?php echo esc_url(of_get_option('youtube','#')); ?>" target="_blank"><div class="youtube icon"></div></a>
                    <?php } ?>
                    <?php if( of_get_option('vimeo',true) != ''){ ?>
                    	<a href="<?php echo esc_url(of_get_option('vimeo','#')); ?>" target="_blank"><div class="vimeo icon"></div></a>
                    <?php } ?>
                    <?php if( of_get_option('rss',true) != ''){ ?>
                    	<a href="<?php echo esc_url(of_get_option('rss','#')); ?>" target="_blank"><div class="rss icon"></div></a>
                    <?php } ?>
                    <?php if( of_get_option('insta',true) != ''){ ?>
                    	<a href="<?php echo esc_url(of_get_option('insta','#')); ?>" target="_blank"><div class="instagram icon"></div></a>
                    <?php } ?>
                    </div><!-- social-icons -->
                </div><!-- container --> 
</section>
<?php } ?>
 <div id="footer-wrapper">
    	<footer class="footer">
        	<div class="footer-col-1">
            	<h2><?php  echo of_get_option('footerabttitle',__('About SKT White','skt-white')); ?></h2>
                <p><?php echo of_get_option('footerabttext',__('Donec ut ex ac nulla pellentesque mollis in a enim. Praesent placerat sapien mauris, vitae sodales tellus venenatis ac. Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin sed, porta quis urna. Quisque velit nibh, egestas et erat a, vehicula interdum augue. Morbi ut elementum justo. Sed eu nibh orci. Vivamus elementum erat orci. Curabitur consequat convallis dapibus.','skt-white')); ?></p>
            </div>
            
            <div class="footer-col-1">
            	<h2><?php echo of_get_option('recenttitle',__('Recent Posts','skt-white')); ?></h2>
                <ul class="recent-post">
                	<?php $query =  new wp_query(array('posts_per_page'   => 2)); ?>
                    <?php  while( $query->have_posts() ) : $query->the_post(); ?>
                  	<li><a href="<?php esc_url(the_permalink()); ?>"><?php get_the_post_thumbnail( get_the_ID(), array(67,49) ); ?><?php the_excerpt(); ?><br />
                    <span><?php _e('Read more...','skt-white'); ?></span></a></li>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </ul>
            </div>
            
            <div class="footer-col-3">
            	<h2><?php echo of_get_option('addresstitle',__('SKT White','skt-white')); ?></h2>
                <p><?php echo of_get_option('address',__('Street 238,52 tempor Donec ultricies mattis nulla, suscipit risus tristique ut.','skt-white')) ; ?></p>
                <div class="phone-no">
                	<?php if( of_get_option('phone',true) != ''){ ?>
                		<p><strong><?php _e('Phone:','skt-white'); ?></strong><?php  echo of_get_option('phone','+1 500 000 0000'); ?></p>
                   	<?php } ?>
                    <?php if( of_get_option('email',true) != '' ) { ?>
                    	<p><strong><?php _e('E-mail:','skt-white'); ?></strong><a href="mailto:<?php echo sanitize_email(of_get_option('email','demo@lorem.com')); ?>"><?php echo of_get_option('email','demo@lorem.com'); ?></a></p>
                    <?php } ?>
                    <?php if( of_get_option('weblink',true) != ''){ ?>
                    <p><strong><?php _e('Website:','skt-white'); ?></strong><a href="<?php echo esc_url(of_get_option('weblink','http://www.websitedomain.com')); ?>" target="_blank"><?php echo of_get_option('weblink','http://www.websitedomain.com'); ?></a></p>
                    <?php } ?>
                </div>
            </div>
            <div class="clear"></div>
        </footer>
        
        <div class="copyright-wrapper">
        	<div class="copyright">
            	<div class="copyright-txt"><?php echo of_get_option('copytext',__('&copy; 2015 SKT White. All Rights Reserved','skt-white')); ?></div>
                <div class="design-by"><?php echo SKT_DESIGN_BY; ?></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
  
<?php wp_footer(); ?>

</body>
</html>