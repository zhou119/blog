<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package nucleare
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nucleare' ); ?></a>
	
	<div class="theNavigationBar">
		<div class="theNavigationBlock">
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
			<?php 
				$hideRss = get_theme_mod('nucleare_theme_options_rss', '1');
				$hideSearch = get_theme_mod('nucleare_theme_options_hidesearch', '1');
				$facebookURL = get_theme_mod('nucleare_theme_options_facebookurl', '#');
				$twitterURL = get_theme_mod('nucleare_theme_options_twitterurl', '#');
				$googleplusURL = get_theme_mod('nucleare_theme_options_googleplusurl', '#');
				$linkedinURL = get_theme_mod('nucleare_theme_options_linkedinurl', '#');
				$instagramURL = get_theme_mod('nucleare_theme_options_instagramurl', '#');
				$youtubeURL = get_theme_mod('nucleare_theme_options_youtubeurl', '#');
				$pinterestURL = get_theme_mod('nucleare_theme_options_pinteresturl', '#');
				$tumblrURL = get_theme_mod('nucleare_theme_options_tumblrurl', '#');
				$vkURL = get_theme_mod('nucleare_theme_options_vkurl', '#');
				$stumbleuponURL = get_theme_mod('nucleare_theme_options_stumbleuponurl', '');
				$snapchatURL = get_theme_mod('nucleare_theme_options_snapchaturl', '');
			?>
			<div class="theNavigationSocial">
				<?php if (!empty($facebookURL)) : ?>
					<a href="<?php echo esc_url($facebookURL); ?>" title="<?php esc_attr_e( 'Facebook', 'nucleare' ); ?>"><i class="fa fa-facebook"><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($twitterURL)) : ?>
					<a href="<?php echo esc_url($twitterURL); ?>" title="<?php esc_attr_e( 'Twitter', 'nucleare' ); ?>"><i class="fa fa-twitter"><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($googleplusURL)) : ?>
					<a href="<?php echo esc_url($googleplusURL); ?>" title="<?php esc_attr_e( 'Google Plus', 'nucleare' ); ?>"><i class="fa fa-google-plus"><span class="screen-reader-text"><?php esc_html_e( 'Google Plus', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($linkedinURL)) : ?>
					<a href="<?php echo esc_url($linkedinURL); ?>" title="<?php esc_attr_e( 'Linkedin', 'nucleare' ); ?>"><i class="fa fa-linkedin"><span class="screen-reader-text"><?php esc_html_e( 'Linkedin', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($instagramURL)) : ?>
					<a href="<?php echo esc_url($instagramURL); ?>" title="<?php esc_attr_e( 'Instagram', 'nucleare' ); ?>"><i class="fa fa-instagram"><span class="screen-reader-text"><?php esc_html_e( 'Instagram', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($youtubeURL)) : ?>
					<a href="<?php echo esc_url($youtubeURL); ?>" title="<?php esc_attr_e( 'YouTube', 'nucleare' ); ?>"><i class="fa fa-youtube"><span class="screen-reader-text"><?php esc_html_e( 'YouTube', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($pinterestURL)) : ?>
					<a href="<?php echo esc_url($pinterestURL); ?>" title="<?php esc_attr_e( 'Pinterest', 'nucleare' ); ?>"><i class="fa fa-pinterest"><span class="screen-reader-text"><?php esc_html_e( 'Pinterest', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($tumblrURL)) : ?>
					<a href="<?php echo esc_url($tumblrURL); ?>" title="<?php esc_attr_e( 'Tumblr', 'nucleare' ); ?>"><i class="fa fa-tumblr"><span class="screen-reader-text"><?php esc_html_e( 'Tumblr', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($vkURL)) : ?>
					<a href="<?php echo esc_url($vkURL); ?>" title="<?php esc_attr_e( 'VK', 'nucleare' ); ?>"><i class="fa fa-vk"><span class="screen-reader-text"><?php esc_html_e( 'VK', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($stumbleuponURL)) : ?>
					<a href="<?php echo esc_url($stumbleuponURL); ?>" title="<?php esc_attr_e( 'Stumbleupon', 'nucleare' ); ?>"><i class="fa fa-stumbleupon"><span class="screen-reader-text"><?php esc_html_e( 'Stumbleupon', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($snapchatURL)) : ?>
					<a href="<?php echo esc_url($snapchatURL); ?>" title="<?php esc_attr_e( 'Snapchat', 'nucleare' ); ?>"><i class="fa fa-snapchat"><span class="screen-reader-text"><?php esc_html_e( 'Snapchat', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if ($hideRss == 1 ) : ?>
					<a href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php esc_attr_e( 'RSS', 'nucleare' ); ?>"><i class="fa fa-rss"><span class="screen-reader-text"><?php esc_html_e( 'RSS', 'nucleare' ); ?></span></i></a>
				<?php endif; ?>
				<?php if ($hideSearch == 1 ) : ?>
					<div id="open-search" class="top-search"><i class="fa fa-search"><span class="screen-reader-text"><?php esc_html_e( 'Search', 'nucleare' ); ?></span></i></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php if ($hideSearch == 1 ) : ?>
	<!-- Start: Search Form -->
		<div id="search-full">
			<div class="search-container">
				<?php get_search_form(); ?>
				<span><a id="close-search"><i class="fa fa-close spaceRight"></i><?php esc_html_e('Close', 'nucleare'); ?></a></span>
			</div>
		</div>
	<!-- End: Search Form -->
	<?php endif; ?>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
