<?php 
/**
 * nucleare functions and dynamic template
 *
 * @package nucleare
 */
 
 /**
 * Replace Excerpt More
 */
if ( ! function_exists( 'nucleare_new_excerpt_more' ) ) {
	function nucleare_new_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}
		return '&hellip;';
	}
}
add_filter('excerpt_more', 'nucleare_new_excerpt_more');

 /**
 * Delete font size style from tag cloud widget
 */
if ( ! function_exists( 'nucleare_fix_tag_cloud' ) ) {
	function nucleare_fix_tag_cloud($tag_string){
	   return preg_replace('/ style=("|\')(.*?)("|\')/','',$tag_string);
	}
}
add_filter('wp_generate_tag_cloud', 'nucleare_fix_tag_cloud',10,1);

 /**
 * Register All Colors
 */
function nucleare_color_primary_register( $wp_customize ) {
	$colors = array();
	
	$colors[] = array(
		'slug'=>'text_color_first', 
		'default' => '#5e5e5e',
		'label' => __('Text Color', 'nucleare')
	);
	
	$colors[] = array(
		'slug'=>'text_color_fourth', 
		'default' => '#b9b9b9',
		'label' => __('Second Text Color', 'nucleare')
	);
	
	$colors[] = array(
		'slug'=>'box_color_second', 
		'default' => '#ffffff',
		'label' => __('Box Background', 'nucleare')
	);
	
	$colors[] = array(
		'slug'=>'special_color_third', 
		'default' => '#7fc7af',
		'label' => __('Special Color', 'nucleare')
	);
	
	foreach( $colors as $nucleare_theme_options ) {
		// SETTINGS
		$wp_customize->add_setting( 'nucleare_theme_options[' . $nucleare_theme_options['slug'] . ']', array(
				'default' => $nucleare_theme_options['default'],
				'type' => 'option', 
				'sanitize_callback' => 'sanitize_hex_color',
				'capability' => 'edit_theme_options'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$nucleare_theme_options['slug'], 
				array('label' => $nucleare_theme_options['label'], 
				'section' => 'colors',
				'settings' =>'nucleare_theme_options[' . $nucleare_theme_options['slug'] . ']',
				)
			)
		);
	}
	
	/*
	Start Nucleare Options
	=====================================================
	*/
	$wp_customize->add_section( 'cresta_nucleare_options', array(
	     'title'    => esc_html__( 'Nucleare Theme Options', 'nucleare' ),
	     'priority' => 50,
	) );
	
	/*
	Social Icons
	=====================================================
	*/
	$socialmedia = array();
	
	$socialmedia[] = array(
	'slug'=>'facebookurl', 
	'default' => '#',
	'label' => __('Facebook URL', 'nucleare')
	);
	$socialmedia[] = array(
	'slug'=>'twitterurl', 
	'default' => '#',
	'label' => __('Twitter URL', 'nucleare')
	);
	$socialmedia[] = array(
	'slug'=>'googleplusurl', 
	'default' => '#',
	'label' => __('Google Plus URL', 'nucleare')
	);
	$socialmedia[] = array(
	'slug'=>'linkedinurl', 
	'default' => '#',
	'label' => __('Linkedin URL', 'nucleare')
	);
	$socialmedia[] = array(
	'slug'=>'instagramurl', 
	'default' => '#',
	'label' => __('Instagram URL', 'nucleare')
	);
	$socialmedia[] = array(
	'slug'=>'youtubeurl', 
	'default' => '#',
	'label' => __('YouTube URL', 'nucleare')
	);
	$socialmedia[] = array(
	'slug'=>'pinteresturl', 
	'default' => '#',
	'label' => __('Pinterest URL', 'nucleare')
	);
	$socialmedia[] = array(
	'slug'=>'tumblrurl', 
	'default' => '#',
	'label' => __('Tumblr URL', 'nucleare')
	);
	$socialmedia[] = array(
	'slug'=>'vkurl', 
	'default' => '#',
	'label' => __('VK URL', 'nucleare')
	);
	$socialmedia[] = array(
	'slug'=>'stumbleuponurl', 
	'default' => '',
	'label' => __('Stumbleupon URL', 'nucleare')
	);
	$socialmedia[] = array(
	'slug'=>'snapchaturl', 
	'default' => '',
	'label' => __('Snapchat URL', 'nucleare')
	);
	
	foreach( $socialmedia as $nucleare_theme_options ) {
		// SETTINGS
		$wp_customize->add_setting(
			'nucleare_theme_options_' . $nucleare_theme_options['slug'], array(
				'default' => $nucleare_theme_options['default'],
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'type'     => 'theme_mod',
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			$nucleare_theme_options['slug'], 
			array('label' => $nucleare_theme_options['label'], 
			'section'    => 'cresta_nucleare_options',
			'settings' =>'nucleare_theme_options_' . $nucleare_theme_options['slug'],
			)
		);
	}
	
	/*
	RSS Button
	=====================================================
	*/
	$wp_customize->add_setting('nucleare_theme_options_rss', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'nucleare_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('nucleare_theme_options_rss', array(
        'label'      => __( 'Show RSS Button', 'nucleare' ),
        'section'    => 'cresta_nucleare_options',
        'settings'   => 'nucleare_theme_options_rss',
        'type'       => 'checkbox',
    ) );
	
	/*
	Search Button
	=====================================================
	*/
	$wp_customize->add_setting('nucleare_theme_options_hidesearch', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'nucleare_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('nucleare_theme_options_hidesearch', array(
        'label'      => __( 'Show Search Button in Main Menu', 'nucleare' ),
        'section'    => 'cresta_nucleare_options',
        'settings'   => 'nucleare_theme_options_hidesearch',
        'type'       => 'checkbox',
    ) );
	
	/*
	Show full post or excerpt
	=====================================================
	*/
	$wp_customize->add_setting('nucleare_theme_options_postshow', array(
        'default'    => 'excerpt',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'nucleare_sanitize_select'
    ) );
	
	$wp_customize->add_control('nucleare_theme_options_postshow', array(
        'label'      => __( 'Post show', 'nucleare' ),
        'section'    => 'cresta_nucleare_options',
        'settings'   => 'nucleare_theme_options_postshow',
        'type'       => 'select',
		'choices' => array(
			'full' => __( 'Show full post', 'nucleare'),
			'excerpt' => __( 'Show excerpt', 'nucleare'),
		),
    ) );
	
	/*
	Scroll top also on mobile
	=====================================================
	*/
	$wp_customize->add_setting('nucleare_theme_options_scroll_top', array(
        'default'    => '',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'nucleare_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('nucleare_theme_options_scroll_top', array(
        'label'      => __( 'Scroll to top also on mobile', 'nucleare' ),
        'section'    => 'cresta_nucleare_options',
        'settings'   => 'nucleare_theme_options_scroll_top',
        'type'       => 'checkbox',
    ) );
	
	/*
	Upgrade to PRO
	=====================================================
	*/
    class Nucleare_Customize_Upgrade_Control extends WP_Customize_Control {
        public function render_content() {  ?>
        	<p class="nucleare-upgrade-title">
        		<span class="customize-control-title">
					<h3 style="text-align:center;"><div class="dashicons dashicons-megaphone"></div> <?php esc_html_e('Get Nucleare PRO WP Theme for only', 'nucleare'); ?> 24,90&euro;</h3>
        		</span>
        	</p>
			<p style="text-align:center;" class="nucleare-upgrade-button">
				<a style="margin: 10px;" target="_blank" href="https://crestaproject.com/demo/nucleare-pro/" class="button button-secondary">
					<?php esc_html_e('Watch the demo', 'nucleare'); ?>
				</a>
				<a style="margin: 10px;" target="_blank" href="https://crestaproject.com/downloads/nucleare/" class="button button-secondary">
					<?php esc_html_e('Get Nucleare PRO Theme', 'nucleare'); ?>
				</a>
			</p>
			<ul>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Advanced Theme Options', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Logo Upload', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'WooCommerce Style', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Choose sidebar position', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Loading Page', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Font Switcher', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Unlimited Colors and Skin', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Beautiful Slider', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Post views counter', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Breadcrumb', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Sticky Sidebar', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Post format', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( '7 Shortcodes', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( '10 Exclusive Widgets', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Related Posts Box', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Information About Author Box', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Advertising System', 'nucleare' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'And much more...', 'nucleare' ); ?></b></li>
			<ul><?php
        }
    }
	
	$wp_customize->add_section( 'cresta_upgrade_pro', array(
	     'title'    => esc_html__( 'More features? Upgrade to PRO', 'nucleare' ),
	     'priority' => 999,
	));
	
	$wp_customize->add_setting('nucleare_section_upgrade_pro', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	));
	
	$wp_customize->add_control(new Nucleare_Customize_Upgrade_Control($wp_customize, 'nucleare_section_upgrade_pro', array(
		'section' => 'cresta_upgrade_pro',
		'settings' => 'nucleare_section_upgrade_pro',
	)));
	
}
add_action( 'customize_register', 'nucleare_color_primary_register' );

function nucleare_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

function nucleare_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Add Custom CSS to Header 
 */
function nucleare_custom_css_styles() { 
	global $nucleare_theme_options;
	$se_options = get_option( 'nucleare_theme_options', $nucleare_theme_options );
	if( isset( $se_options[ 'text_color_first' ] ) ) {
		$text_color_first = $se_options['text_color_first'];
	}
	if( isset( $se_options[ 'box_color_second' ] ) ) {
		$box_color_second = $se_options['box_color_second'];
	}
	if( isset( $se_options[ 'special_color_third' ] ) ) {
		$special_color_third = $se_options['special_color_third'];
	}
	if( isset( $se_options[ 'text_color_fourth' ] ) ) {
		$text_color_fourth = $se_options['text_color_fourth'];
	}
?>

<style>
	<?php if (!empty($text_color_first) && $text_color_first != '#5e5e5e' ) : ?>
	body,
	button,
	input,
	select,
	textarea,
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	input[type="number"]:focus,
	input[type="tel"]:focus,
	input[type="range"]:focus,
	input[type="date"]:focus,
	input[type="month"]:focus,
	input[type="week"]:focus,
	input[type="time"]:focus,
	input[type="datetime"]:focus,
	input[type="datetime-local"]:focus,
	input[type="color"]:focus,
	textarea:focus,
	a:hover,
	a:focus,
	a:active,
	.entry-title a,
	.main-navigation ul li:hover > a, 
	.main-navigation ul li.focus > a, 
	.main-navigation li.current-menu-item > a, 
	.main-navigation li.current-menu-parent > a, 
	.main-navigation li.current-page-ancestor > a,
	.main-navigation .current_page_item > a, 
	.main-navigation .current_page_parent > a,
	.post-navigation .meta-nav .nextPrevName,
	.page-links span {
		color: <?php echo esc_html($text_color_first); ?>;
	}
	.site-info {
		color: <?php echo esc_html($text_color_first); ?> !important;
	}
	<?php endif; ?>
	
	<?php if (!empty($text_color_fourth) && $text_color_fourth != '#b9b9b9' ) : ?>
	.smallPart,
	aside .tagcloud,
	.smallPart a,
	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="tel"],
	input[type="password"],
	input[type="search"],
	input[type="number"],
	input[type="tel"],
	input[type="range"],
	input[type="date"],
	input[type="month"],
	input[type="week"],
	input[type="time"],
	input[type="datetime"],
	input[type="datetime-local"],
	input[type="color"],
	textarea,
	.theNavigationSocial a,
	.sticky .entry-header:before,
	.menu-toggle {
		color: <?php echo esc_html($text_color_fourth); ?>;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	button:focus,
	input[type="button"]:focus,
	input[type="reset"]:focus,
	input[type="submit"]:focus,
	button:active,
	input[type="button"]:active,
	input[type="reset"]:active,
	input[type="submit"]:active,
	.tagcloud a:hover,
	.theNavigationSocial .top-search:hover,
	.theNavigationSocial .top-search:focus,
	.readMoreLink:hover,
	.page-links span a:hover,
	.page-links span a:focus {
		background: <?php echo esc_html($text_color_fourth); ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($box_color_second) && $box_color_second != '#ffffff' ) : ?>
	<?php list($r, $g, $b) = sscanf($box_color_second, '#%02x%02x%02x'); ?>
	#search-full {
		background: rgba(<?php echo esc_html($r).', '.esc_html($g).', '.esc_html($b); ?>, 0.9);
	}
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.tagcloud a,
	.tagcloud a:hover,
	#wp-calendar > caption,
	.theNavigationSocial .top-search,
	figure.entry-featuredImg figcaption,
	figure.entry-featuredImg p,
	.page-links span a,
	.menu-toggle:focus,
	.menu-toggle:hover {
		color: <?php echo esc_html($box_color_second); ?>;
	}
	.readMoreLink a,
	.readMoreLink a:hover {
		color: <?php echo esc_html($box_color_second); ?> !important;
	}
	::-moz-selection {
		color: <?php echo esc_html($box_color_second); ?>;
	}
	::selection {
		color: <?php echo esc_html($box_color_second); ?>;
	}
	.main-navigation li,
	.site-main .paging-navigation,
	.site-main .post-navigation,
	#disqus_thread,
	.theNavigationBar,
	#toTop,
	figure.entry-featuredImg:after,
	.hentry,
	.page-header,
	.page-content,
	.comments-area,
	.menu-toggle {
		background: <?php echo esc_html($box_color_second); ?>;
	}
	figure.entry-featuredImg figcaption::before {
		border-top: 1px solid <?php echo esc_html($box_color_second); ?>;
		border-bottom: 1px solid <?php echo esc_html($box_color_second); ?>;
	}
	figure.entry-featuredImg figcaption::after {
		border-right: 1px solid <?php echo esc_html($box_color_second); ?>;
		border-left: 1px solid <?php echo esc_html($box_color_second); ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($special_color_third) && $special_color_third != '#7fc7af' ) : ?>
	.site-info a,
	.site-info a:hover,
	.footer-menu ul li a,
	.footer-menu ul li a:hover {
		color: <?php echo esc_html($special_color_third); ?> !important;
	}
	a, 
	.entry-title a:hover, 
	.entry-title a:focus,
	.post-navigation .meta-nav .nextPrevName:hover,
	.theNavigationSocial a:hover {
		color: <?php echo esc_html($special_color_third); ?>;
	}
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.tagcloud a,
	#wp-calendar > caption,
	.theNavigationSocial .top-search,
	.readMoreLink,
	figure.entry-featuredImg,
	.page-links span a,
	.menu-toggle:focus,
	.menu-toggle:hover {
		background: <?php echo esc_html($special_color_third); ?>;
	}
	::-moz-selection {
		background: <?php echo esc_html($special_color_third); ?>;
	}
	::selection {
		background: <?php echo esc_html($special_color_third); ?>;
	}
	blockquote {
		border-left: 5px solid <?php echo esc_html($special_color_third); ?>;
		border-right: 2px solid <?php echo esc_html($special_color_third); ?>;
	}
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	input[type="number"]:focus,
	input[type="tel"]:focus,
	input[type="range"]:focus,
	input[type="date"]:focus,
	input[type="month"]:focus,
	input[type="week"]:focus,
	input[type="time"]:focus,
	input[type="datetime"]:focus,
	input[type="datetime-local"]:focus,
	input[type="color"]:focus,
	textarea:focus,
	#wp-calendar tbody td#today {
		border: 1px solid <?php echo esc_html($special_color_third); ?>;
	}
	.main-navigation div > ul > li > ul > li:first-child {
		border-top: 2px solid <?php echo esc_html($special_color_third); ?>;
	}
	.main-navigation div > ul > li > ul::before,
	.main-navigation div > ul > li > ul::after	{
		border-bottom-color: <?php echo esc_html($special_color_third); ?>;
	}
	@media screen and (max-width: 1024px) {
		.main-navigation ul li .indicator {
			color: <?php echo esc_html($special_color_third); ?>;
		}
	}
	<?php endif; ?>
	
</style>
    <?php
}
add_action('wp_head', 'nucleare_custom_css_styles');