<?php
/**
 * The Template for displaying all single posts.
 *
 * @package SKT White
 */

get_header(); ?>

<div class="content-area">
    <div class="middle-align content_sidebar">
        <div class="site-main" id="sitemain">
			<?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'single' ); ?>
                <?php skt_white_content_nav( 'nav-below' ); ?>
                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                    comments_template();
                ?>
            <?php endwhile; // end of the loop. ?>
        </div>
        <?php get_sidebar();?>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>