<?php
/**
 * Sets up the options panel for Visual
 * Requires the Options Framework Plugin
 * http://wordpress.org/extend/plugins/options-framework/
 *
 * @package Visual
 * @since Visual 0.3
 */

/* Save options under "visual-theme" option name */

function optionsframework_option_name() {
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = 'visual-theme';
	update_option('optionsframework', $optionsframework_settings);
}

/* Theme Options Array */

function optionsframework_options() {

	$options = array();

	$options[] = array(
		'name' => __( 'Visual Options', 'visual' ),
		'type' => 'heading',
	);
	
	$options['visual_styles'] = array(
		'name' => __( 'Visual Style', 'visual' ),
		'desc' => __('Select a style for the theme.' , 'visual'),
		'id' => 'visual_style',
		'std' => 'dark',
		'type' => 'select',
		'options' => array(
				get_stylesheet_directory_uri() . '/css/dark.css' => __( 'Dark', 'visual' ),
				get_stylesheet_directory_uri() . '/css/light.css' => __( 'Light', 'visual' ),
				"0" => "Minimal", // Default stylesheet
			)
		);
	
	$footer_text = sprintf(
		'<a href="%1$s" title="%2$s" rel="generator">WordPress</a> <a href="%3$s">%4$s</a>',
		esc_url( 'http://wordpress.org' ),
		__( 'A Semantic Personal Publishing Platform', 'visual' ),
		esc_url( 'http://wptheming.com' ),
		__( 'Theme: Visual', 'visual' )
    );

	$options['footer_text'] = array(
		'name' => __( 'Footer Text', 'visual' ),
		'desc' => __( 'This text will go in the footer of the theme.  If you leave it completely blank, no footer will be displayed.  HTML is fine to use.', 'visual' ),
		'id' => 'footer_text',
		'std' => visual_return_footer_text(),
		'type' => 'textarea'
	);

	return $options;
}