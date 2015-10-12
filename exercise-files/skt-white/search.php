<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package SKT White
 */

get_header(); ?>

<div class="content-area">
    <div class="middle-align content_sidebar">
        <div class="site-main" id="sitemain">
			<?php if ( have_posts() ) : ?>
                <header>
                    <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'skt-white' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'search' ); ?>
                <?php endwhile; ?>
                <?php skt_white_pagination(); ?>
            <?php else : ?>
                <?php get_template_part( 'no-results', 'search' ); ?>
            <?php endif; ?>
        </div>
        <?php get_sidebar();?>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>