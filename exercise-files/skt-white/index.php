<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT White
 */

get_header(); 
?>

<?php if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && $wp_query->get_queried_object_id() == get_option( 'page_for_posts' ) ) : ?>

    <div class="content-area">
        <div class="middle-align content_sidebar">
            <div class="site-main" id="sitemain">
				<?php
                if ( have_posts() ) :
                    // Start the Loop.
                    while ( have_posts() ) : the_post();
                        /*
                         * Include the post format-specific template for the content. If you want to
                         * use this in a child theme, then include a file called called content-___.php
                         * (where ___ is the post format) and that will be used instead.
                         */
                        get_template_part( 'content', get_post_format() );
                
                    endwhile;
                    // Previous/next post navigation.
                    skt_white_pagination();
                
                else :
                    // If no content, include the "No posts found" template.
                     get_template_part( 'no-results', 'index' );
                
                endif;
                ?>
            </div>
            <?php get_sidebar();?>
            <div class="clear"></div>
        </div>
    </div>


<?php else: ?>

	<?php
		$section_text = array(
		1 => array(
			'section_title'		=> 'Our Services',
			'menutitle'			=> 'services',
			'bgcolor' 			=> '#ffffff',
			'bgimage'			=> '',
			'class'				=> 'services',
			'content'			=> '<div id="services-box">
				<img src="'.get_template_directory_uri().'/images/icon-web-design.png">
				<h2>Web <span>Design</span></h2>
				<p>Lorem Ipsum is simply dummy text of they printing and typesetting industry. Lore Ipsum has been the industry standard in dummy text ever since the 1500s, when an unknown printer took a galley of type andin scrambled it to make a type book.</p>
				<a href="#" class="read-more">Read More</a>
				</div><div id="services-box">
				<img src="'.get_template_directory_uri().'/images/icon-web-design.png">
				<h2>Web <span>Development</span></h2>
				<p>Lorem Ipsum is simply dummy text of they printing and typesetting industry. Lore Ipsum has been the industrys standard in dummy text ever since the 1500s, when an unknown printer took a galley of type andin scrambled it to make a type book.</p>
				<a href="#" class="read-more">Read More</a>
				</div><div id="services-box">
				<img src="'.get_template_directory_uri().'/images/icon-web-design.png">
				<h2>Mobile <span>Website</span></h2>
				<p>Lorem Ipsum is simply dummy text of they printing and typesetting industry. Lore Ipsum has been the industrys standard in dummy text ever since the 1500s, when an unknown printer took a galley of type andin scrambled it to make a type book.</p>
				<a href="#" class="read-more">Read More</a>
				</div><div id="services-box">
				<img src="'.get_template_directory_uri().'/images/icon-web-design.png">
				<h2>WordPress <span>Themes</span></h2>
				<p>Lorem Ipsum is simply dummy text of they printing and typesetting industry. Lore Ipsum has been the industrys standard in dummy text ever since the 1500s, when an unknown printer took a galley of type andin scrambled it to make a type book.</p>
				<a href="#" class="read-more">Read More</a>
				</div>',
			
		),
		
		2 => array(
			'section_title'	=> '',
			'menutitle'		=> '',
			'bgcolor' 		=> '',
			'bgimage'		=> get_template_directory_uri()."/images/contact-banner.jpg",
			'class'			=> 'contact-banner',
			'content'		=> '<h3>Do you like SKT White? Is it everything you wanted from a theme?</h3>
            <a class="contact-button" href="#">Contact Us</a>',
		),

		3 => array(
			'section_title'	=> 'A message from our manager',
			'menutitle'		=> '',
			'bgcolor' 		=> '#ffffff',
			'menutitle'		=> '',
			'bgimage'		=> '',
			'class'			=> 'gry-row',
			'content'		=> '<div class="one_half"><div class="message-thumb"><img src="'.get_template_directory_uri().'/images/manager-img.jpg" /></div></div><div class="one_half last"><div class="message-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet ex at mauris varius interdum. Fusce mattis gravida libero, nec sollicitudin eros finibus at. Praesent ex diam, mattis vitae efficitur vel, egestas sed neque. Sed congue interdum cursus. Nullam in tincidunt neque. Cras enim tortor, porta id tempor vel, placerat et tellus. Vestibulum eget ullamcorper orci. Suspendisse potenti. Proin rutrum magna ac gravida scelerisque. Nunc eu sodales nisi. Curabitur ligula quam, maximus commodo sodales ut, pretium eget ipsum. Proin lobortis, nibh vel fringilla dictum, ipsum tortor cursus ex, facilisis cursus sapien sem at sem. Mauris in risus ac massa congue volutpat sit amet at metus. Ut in metus posuere, rutrum risus eget, aliquam arcu. Curabitur tincidunt, nulla ut pellentesque aliquet, mi risus pharetra sem, at euismod tortor eros imperdiet turpis.
			<br/>Donec ut ex ac nulla pellentesque mollis in a enim. Praesent placerat sapien mauris, vitae sodales tellus venenatis ac. Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin sed, porta quis urna. Quisque velit nibh, egestas et erat a, vehicula interdum augue. Morbi ut elementum justo. Fusce mattis gravida libero, nec sollicitudin eros finibus at. Praesent ex diam, mattis vitae efficitur vel, egestas sed neque. Sed congue interdum cursus. Nullam in tincidunt neque. Cras enim tortor, porta id tempor vel, placerat et tellus. Vestibulum eget ullamcorper orci. Suspendisse potenti. Proin rutrum magna ac gravida scelerisque. Nunc eu sodales nisi.</div></div>',
		),
		
		4 => array(
			'section_title'	=> 'Our Statistics',
			'menutitle'		=> 'stat',
			'bgcolor' 		=> '',
			'bgimage'		=> get_template_directory_uri().'/images/stat-banner.jpg',
			'class'			=> 'stat',
			'content'		=> '<ul id="some-facts">
			<li><h2>2000</h2><h5>Download</h5></li><li><h2>300</h2><h5>Projects Done</h5></li><li><h2>400</h2><h5>Happy Clients</h5></li><li><h2>100</h2><h5>Awards Won</h5></li><br>
			</ul>',
			
		),
		
		5 => array(
			'section_title'	=> 'Our Support',
			'menutitle'		=> 'support',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> 'our-team',
			'content'		=> '<div class="team-desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia malesuada mi vitae tristique. Donec fringilla ullamcorper nulla sed gravida. Vestibulum quis sollicitudin nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis odio augue, efficitur non viverra a, fermentum sit amet felis. Cras scelerisque purus eu pellentesque feugiat. Curabitur ut bibendum ante. Sed et ex blandit, auctor purus mollis, euismod mi. Fusce vel nisi sit amet dolor condimentum ultricies. Morbi sagittis arcu sed odio finibus eleifend. Pellentesque nunc purus, scelerisque rutrum sem eu, accumsan tempor orci. Aliquam neque neque, elementum et nunc non, sodales fringilla turpis. </div>'
		),
		
		6 => array(
			'section_title'	=> 'Our Projects',
			'menutitle'		=> 'portfolio',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> 'our-projects',
			'content'		=> '<a class="example-image-link" href="'.get_template_directory_uri().'/images/banner-seventh.jpg" data-lightbox="example-set" data-title="Title 1"><img src="'.get_template_directory_uri().'/images/banner-seventh.jpg"></a><a class="example-image-link" href="'.get_template_directory_uri().'/images/banner-sixth.jpg" data-lightbox="example-set" data-title="Title 2"><img src="'.get_template_directory_uri().'/images/banner-sixth.jpg"></a><a class="example-image-link" href="'.get_template_directory_uri().'/images/banner-fifth.jpg" data-lightbox="example-set" data-title="Title 3"><img src="'.get_template_directory_uri().'/images/banner-fifth.jpg"></a><a class="example-image-link" href="'.get_template_directory_uri().'/images/banner-fourth.jpg" data-lightbox="example-set" data-title="Title 4"><img style="margin-right:0;" src="'.get_template_directory_uri().'/images/banner-fourth.jpg"></a><a class="example-image-link" href="'.get_template_directory_uri().'/images/banner-nine.jpg" data-lightbox="example-set" data-title="Title 5"><img src="'.get_template_directory_uri().'/images/banner-nine.jpg"></a><a class="example-image-link" href="'.get_template_directory_uri().'/images/banner-ten.jpg" data-lightbox="example-set" data-title="Title 6"><img src="'.get_template_directory_uri().'/images/banner-ten.jpg"></a><a class="example-image-link" href="'.get_template_directory_uri().'/images/banner-sixth.jpg" data-lightbox="example-set" data-title="Title 7"><img src="'.get_template_directory_uri().'/images/banner-sixth.jpg"></a><a class="example-image-link" href="'.get_template_directory_uri().'/images/banner-fifth.jpg" data-lightbox="example-set" data-title="Title 8"><img style="margin-right:0;" src="'.get_template_directory_uri().'/images/banner-fifth.jpg"></a>'
		),
		
		7 => array(
			'section_title'	=> 'Our Clients',
			'menutitle'		=> 'contact',
			'bgcolor' 		=> '#ffffff',
			'bgimage'		=> '',
			'class'			=> 'client_banner',
			'content'		=> '<div class="client "><a href="#"><img src="'.get_template_directory_uri().'/images/compact-logo.jpg"></a></div><div class="client "><a href="#"><img src="'.get_template_directory_uri().'/images/tv-digital-logo.jpg"></a></div><div class="client "><a href="#"><img src="'.get_template_directory_uri().'/images/changes-logo.jpg"></a></div><div class="client "><a href="#"><img src="'.get_template_directory_uri().'/images/finance-logo.jpg"></a></div><div class="client last"><a href="#"><img src="'.get_template_directory_uri().'/images/thousand-logo.jpg"></a></div><div class="client "><a href="#"><img src="'.get_template_directory_uri().'/images/finance-logo.jpg"></a></div><div class="client "><a href="#"><img src="'.get_template_directory_uri().'/images/thousand-logo.jpg"></a></div><div class="client "><a href="#"><img src="'.get_template_directory_uri().'/images/changes-logo.jpg"></a></div><div class="client "><a href="#"><img src="'.get_template_directory_uri().'/images/tv-digital-logo.jpg"></a></div><div class="client last"><a href="#"><img src="'.get_template_directory_uri().'/images/compact-logo.jpg"></a></div>'
		),
	);
	
    if( of_get_option('numsection', 7) > 0 ) { 
        $numSections = esc_attr( of_get_option('numsection', 7) );
        for( $s=1; $s<=$numSections; $s++ ){ 
            $title 			= ( of_get_option('sectiontitle'.$s, true) != '' ) ? esc_html( of_get_option('sectiontitle'.$s,$section_text[$s]['section_title']) ) : '';
			$secid			= ( of_get_option('menutitle'.$s, true) != '') ? esc_html( of_get_option('menutitle'.$s, $section_text[$s]['menutitle']) ) : '';
            $class			= ( of_get_option('sectionclass'.$s, true) != '' ) ? esc_html( of_get_option('sectionclass'.$s, $section_text[$s]['class']) ) : '';
            $content		= ( of_get_option('sectioncontent'.$s, true) != '' ) ? of_get_option('sectioncontent'.$s, $section_text[$s]['content']) : ''; 
			$hide			= ( of_get_option('hidesec'.$s, true) != '' ) ? of_get_option('hidesec'.$s, false) : '';
            $bgcolor		= ( of_get_option('sectionbgcolor'.$s, true) != '' ) ? of_get_option('sectionbgcolor'.$s, $section_text[$s]['bgcolor']) : '';
            $bgimage		= ( of_get_option('sectionbgimage'.$s, true) != '' ) ? of_get_option('sectionbgimage'.$s, $section_text[$s]['bgimage']) : '';
            ?>
            <section <?php if( $bgcolor || $bgimage || $hide) { ?>style="<?php echo ($bgcolor != '') ? 'background-color:'.$bgcolor.'; ' : '' ; echo ($bgimage != '') ? 'background-image:url('.$bgimage.'); background-repeat:no-repeat; background-position: center center; background-size: cover; ' : '' ; echo ($hide) != false ? 'display:none;': ''; ?>"<?php } ?> id="<?php echo $secid; ?>" class="<?php echo ( of_get_option('menutitle'.$s, true) != '' ) ? 'menu_page' : '';?>">
            	<div class="container" <?php if($class == 'our-projects'){ ?>style="width:100%"<?php } ?>>
                    <div class="<?php echo ( ($s>22) && $class=='') ? 'top-grey-box' : $class; ?>">
                        <?php if( $title != '' ) { ?>
                        <h2><?php echo $title; ?></h2>
                    <?php } ?>
                    <?php skt_white_the_content_format( $content ); ?>
                     </div><!-- middle-align -->
                    <div class="clear"></div>
                    </div><!-- container -->
            </section><div class="clear"></div>
        
            <?php 
        }
    }
    ?>
<section class="menu_page" style="background-color:#ffffff; ">
            	<div class="container">
                    <div class="latest-news"><h2><?php _e('Latest News','skt-white'); ?></h2>
                    			 <?php $k = 0; ?>
                                 <?php global $wp_query; ?>
                                 <?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                                 	<?php $k++; ?>
                                        <div class="news-box <?php if($k%4==0){?>last<?php } ?>">
											<div class="news">
												<?php if( has_post_thumbnail()){ 
                                                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                                                $imgUrl = $large_image_url[0];
                                                } else {
                                                    $imgUrl = get_template_directory_uri().'/images/img_404.png';
                                                }
                                                ?>
                								<a href="<?php the_permalink(); ?>"><img alt=" " src="<?php echo $imgUrl; ?>"></a>
                								<h2><?php the_title(); ?></h2>
                        						<div style="float:left;"><?php echo get_the_date(); ?></div>
						<div style="float:right;color:#cccccc;font-weight:bold;font-size:15px"><img style="width:auto;float:left;position:relative;top:3px;" src="<?php echo get_template_directory_uri(); ?>/images/icon-comment.png" />&nbsp;&nbsp;<?php echo get_comments_number(); ?></div><div class="clear"></div>
                    						</div>
                        				</div><?php if($k%4==0){ ?><div class="clear"></div><?php } ?>
                    			<?php endwhile; ?>
                                <div class="home-pagination">
                               			<?php skt_white_pagination(); ?>
                               </div><!-- home-pagination -->
                    			<?php wp_reset_query(); ?>
                     </div><!-- latest-news -->
                    <div class="clear"></div>
                    </div><!-- container -->
            </section>
<?php endif; ?>


<?php get_footer(); ?>