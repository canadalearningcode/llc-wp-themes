<?php
/**
 * Page builder support
 *
 * @package Sydney
 */


/* Defaults */
add_theme_support( 'siteorigin-panels', array( 
	'margin-bottom' => 0,
) );

/* Theme widgets */
function sydney_theme_widgets($widgets) {
	$theme_widgets = array(
		'Sydney_Services_Type_A',
		'Sydney_Services_Type_B',
		'Sydney_List',
		'Sydney_Facts',
		'Sydney_Clients',
		'Sydney_Testimonials',
		'Sydney_Skills',
		'Sydney_Action',
		'Sydney_Video_Widget',
		'Sydney_Social_Profile',
		'Sydney_Employees',
		'Sydney_Latest_News',
	);
	foreach($theme_widgets as $theme_widget) {
		if( isset( $widgets[$theme_widget] ) ) {
			$widgets[$theme_widget]['groups'] = array('sydney-theme');
			$widgets[$theme_widget]['icon'] = 'dashicons dashicons-schedule';
		}
	}
	return $widgets;
}
add_filter('siteorigin_panels_widgets', 'sydney_theme_widgets');

/* Add a tab for the theme widgets in the page builder */
function sydney_theme_widgets_tab($tabs){
	$tabs[] = array(
		'title' => __('Sydney Theme Widgets', 'sydney'),
		'filter' => array(
			'groups' => array('sydney-theme')
		)
	);
	return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'sydney_theme_widgets_tab', 20);

/* Replace default row options */
function sydney_row_styles($fields) {

	$fields['bottom_border'] = array(
		'name' => __('Bottom Border Color', 'sydney'),
		'type' => 'color',
		'priority' => 3,		
	);
	$fields['padding'] = array(
		'name' => __('Top/bottom padding', 'sydney'),
		'type' => 'measurement',
		'description' => __('Top and bottom padding for this row [default: 100px]', 'sydney'),
		'priority' => 4,
	);
	$fields['align'] = array(
		'name' => __('Center align the content?', 'sydney'),
		'type' => 'checkbox',
		'description' => __('This may or may not work. It depends on the widget styles.', 'sydney'),
		'priority' => 5,
	);		
	$fields['background'] = array(
		'name' => __('Background Color', 'sydney'),
		'type' => 'color',
		'description' => __('Background color of the row.', 'sydney'),
		'priority' => 6,
	);
	$fields['color'] = array(
		'name' => __('Color', 'sydney'),
		'type' => 'color',
		'description' => __('Color of the row.', 'sydney'),
		'priority' => 7,
	);	
	$fields['background_image'] = array(
		'name' => __('Background Image', 'sydney'),
		'type' => 'image',
		'description' => __('Background image of the row.', 'sydney'),
		'priority' => 8,
	);
	$fields['row_stretch'] = array(
		'name' 		=> __('Row Layout', 'sydney'),
		'type' 		=> 'select',
		'options' 	=> array(
			'' 				 => __('Standard', 'sydney'),
			'full' 			 => __('Full Width', 'sydney'),
			'full-stretched' => __('Full Width Stretched', 'sydney'),
		),
		'priority' => 9,
	);
	$fields['mobile_padding'] = array(
		'name' 		  => __('Mobile padding', 'sydney'),
		'type' 		  => 'select',
		'description' => __('Here you can select a top/bottom row padding for screen sizes < 1024px', 'sydney'),		
		'options' 	  => array(
			'' 				=> __('Default', 'sydney'),
			'mob-pad-0' 	=> __('0', 'sydney'),
			'mob-pad-15'    => __('15px', 'sydney'),
			'mob-pad-30'    => __('30px', 'sydney'),
			'mob-pad-45'    => __('45px', 'sydney'),
		),
		'priority'    => 10,
	);
	$fields['class'] = array(
		'name' => __('Row Class', 'sydney'),
		'type' => 'text',
		'description' => __('Add your own class for this row', 'sydney'),
		'priority' => 11,
	);
	$fields['column_padding'] = array(
		'name'        => __('Columns padding', 'sydney'),
		'type'        => 'checkbox',
		'description' => __('Remove padding between columns for this row?', 'sydney'),
		'priority'    => 12,
	);	

	return $fields;
}
remove_filter('siteorigin_panels_row_style_fields', array('SiteOrigin_Panels_Default_Styling', 'row_style_fields' ) );
add_filter('siteorigin_panels_row_style_fields', 'sydney_row_styles');

/* Filter for the styles */
function sydney_row_styles_output($attr, $style) {
	$attr['style'] = '';

	if(!empty($style['bottom_border'])) $attr['style'] .= 'border-bottom: 1px solid '. esc_attr($style['bottom_border']) . ';';
	if(!empty($style['background'])) $attr['style'] .= 'background-color: ' . esc_attr($style['background']) . ';';
	
	if(!empty($style['color'])) {
		$attr['style'] .= 'color: ' . esc_attr($style['color']) . ';';
		$attr['data-hascolor'] = 'hascolor';
	}
	
	if(!empty($style['align'])) $attr['style'] .= 'text-align: center;';
	if(!empty( $style['background_image'] )) {
		$url = wp_get_attachment_image_src( $style['background_image'], 'full' );
		if( !empty($url) ) {
			$attr['style'] .= 'background-image: url(' . esc_url($url[0]) . ');';
			$attr['data-hasbg'] = 'hasbg';
		}
	}
	if(!empty($style['padding'])) {
		$attr['style'] .= 'padding: ' . esc_attr($style['padding']) . ' 0; ';
	} else {
		$attr['style'] .= 'padding: 100px 0; ';
	}
	if( !empty( $style['row_stretch'] ) ) {
		$attr['class'][] = 'sydney-stretch';
		$attr['data-stretch-type'] = esc_attr($style['row_stretch']);
	}
	if( !empty( $style['mobile_padding'] ) ) {
		$attr['class'][] = esc_attr($style['mobile_padding']);
	}
    if( !empty( $style['column_padding'] ) ) {
       $attr['class'][] = 'no-col-padding';
    }
    
	if(empty($attr['style'])) unset($attr['style']);
	return $attr;
}
add_filter('siteorigin_panels_row_style_attributes', 'sydney_row_styles_output', 10, 2);