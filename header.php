<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
$site_name     = get_bloginfo('name', 'display');
$home_url      = esc_url(home_url('/'));
$header_logo   = esc_url(get_theme_mod('header_logo'));
$sticky_header = get_theme_mod('sticky_header', true);
$fixed_header  = get_theme_mod('fixed_header', true);
$contained     = get_theme_mod('contained_header', true);
$mobile_layout = get_theme_mod('foundationpress_mobile_menu_layout');
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<?php
// Get and normalize mobile menu layout from Customizer
$mobile_layout = get_theme_mod('wpt_mobile_menu_layout', 'offcanvas'); // default to offcanvas
$mobile_layout_normalized = str_replace('-', '', strtolower($mobile_layout));
echo '<!-- Mobile layout: ' . esc_html($mobile_layout) . ' -->';

if ( $mobile_layout_normalized === 'offcanvas' ) :
    get_template_part( 'template-parts/mobile-off-canvas' );
endif;
?>

<?php if ( $sticky_header ) : ?>
<div data-sticky-container class="<?php echo ($fixed_header && has_post_thumbnail()) ? 'fixed-header' : ''; ?>">
	<div data-sticky data-sticky-on="small" data-options="marginTop:0; z-index:100;">
<?php endif; ?>
<header class="site-header" role="banner">
	<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle(); ?>>
		<div class="title-bar-center">
			<span class="site-mobile-title title-bar-title">
				<a href="<?php echo $home_url; ?>" title="<?php echo esc_attr($site_name); ?>" rel="home">
					<?php if ( $header_logo ) : ?>
						<img src="<?php echo $header_logo; ?>" alt="<?php echo esc_attr($site_name); ?>">
					<?php else : ?>
						<?php echo esc_html($site_name); ?>
					<?php endif; ?>
				</a>
			</span>
		</div>
		<div class="title-bar-right">
			<button aria-label="<?php esc_attr_e('Main Menu', 'foundationpress'); ?>" aria-controls="<?php foundationpress_mobile_menu_id(); ?>" class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
		</div>
	</div>
	
	<nav class="site-navigation top-bar" role="navigation" id="<?php foundationpress_mobile_menu_id(); ?>">
		<div class="top-bar-inner-container <?php if ( $contained ) { ?>contained<?php } ?>">
			<div class="top-bar-left">
				<div class="site-desktop-title top-bar-title">
					<a href="<?php echo $home_url; ?>" title="<?php echo esc_attr($site_name); ?>" rel="home">
						<?php if ( $header_logo ) : ?>
							<img src="<?php echo $header_logo; ?>" alt="<?php echo esc_attr($site_name); ?>">
						<?php else : ?>
							<?php echo esc_html($site_name); ?>
						<?php endif; ?>
					</a>
				</div>
			<?php foundationpress_top_bar_l(); ?>
		</div>

		<div class="top-bar-right">
		<?php foundationpress_top_bar_r(); ?>
			<?php if ( ! $mobile_layout || $mobile_layout === 'topbar' ) : ?>
				<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
			<?php endif; ?>
		</div>
	</div>
	</nav>
	
</header>
<?php if ( $sticky_header ) : ?>
	</div>
</div>
<?php endif; ?>