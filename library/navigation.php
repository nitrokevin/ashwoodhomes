<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

register_nav_menus(
	array(
		'top-bar-r'  => esc_html__( 'Right Top Bar', 'foundationpress' ),
		'top-bar-l'  => esc_html__( 'Left Top Bar', 'foundationpress' ),
		'footer-nav-l'  => esc_html__( 'Footer Left', 'foundationpress' ),
		'footer-nav-r'  => esc_html__( 'Footer Right', 'foundationpress' ),
		'mobile-nav' => esc_html__( 'Mobile', 'foundationpress' ),
	)
);


/**
 * Desktop navigation - left top bar
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'foundationpress_top_bar_l' ) ) {
	function foundationpress_top_bar_l() {
		wp_nav_menu(
			array(
				'container'      => false,
				'menu_class'     => 'dropdown menu desktop-menu',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
				'theme_location' => 'top-bar-l',
				'depth'          => 3,
				'fallback_cb'    => false,
				'walker'         => new Foundationpress_Top_Bar_Walker(),
			)
		);
	}
}
/**
 * Desktop navigation - right top bar
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'foundationpress_top_bar_r' ) ) {
	function foundationpress_top_bar_r() {
		wp_nav_menu(
			array(
				'container'      => false,
				'menu_class'     => 'dropdown menu desktop-menu align-right ',
				'items_wrap'     => '<ul id="%1$s" class="%2$s"  data-smooth-scroll data-animation-easing="swing" data-animation-duration="1000">%3$s</ul>',
				'theme_location' => 'top-bar-r',
				'depth'          => 3,
				'fallback_cb'    => false,
				'walker'         => new Foundationpress_Top_Bar_Walker(),
			)
		);
	}
}
// Add button and color classes from li + rel (XFN) to <a>
add_filter( 'nav_menu_link_attributes', function( $atts, $item, $args ) {
    if ( isset( $args->theme_location ) && $args->theme_location === 'top-bar-r' ) {

        $all_classes = [];

        // 1) Copy button/color classes from li
        $li_classes = (array) $item->classes;
        $allowed = [ 'button', 'hollow', 'primary', 'secondary', 'success', 'alert', 'warning' ];
        foreach ( $li_classes as $c ) {
            if ( in_array( $c, $allowed, true ) ) {
                $all_classes[] = $c;
            }
        }

        // 2) Include any rel/XFN classes
        if ( ! empty( $item->xfn ) ) {
            $rel_classes = explode( ' ', $item->xfn );
            foreach ( $rel_classes as $c ) {
                if ( in_array( $c, $allowed, true ) ) {
                    $all_classes[] = $c;
                }
            }
        }

        // 3) Merge with existing classes on <a>
        if ( ! empty( $atts['class'] ) ) {
            $all_classes = array_merge( explode( ' ', $atts['class'] ), $all_classes );
        }

        if ( ! empty( $all_classes ) ) {
            $atts['class'] = implode( ' ', array_unique( $all_classes ) );
        }
    }

    return $atts;
}, 10, 3 );
/**
 * Desktop navigation - left footer
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'foundationpress_footer_nav_l' ) ) {
	function foundationpress_footer_nav_l() {
		wp_nav_menu(
			array(
				'container'      => false,
				'menu_class'     => 'dropdown menu desktop-menu',
				'items_wrap'     => '<ul id="%1$s" class="%2$s footer-left-menu" >%3$s</ul>',
				'theme_location' => 'footer-nav-l',
				'depth'          => 3,
				'fallback_cb'    => false,
				'walker'         => new Foundationpress_Top_Bar_Walker(),
			)
		);
	}
}
/**
 * Desktop navigation - right footer
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'foundationpress_footer_nav_r' ) ) {
	function foundationpress_footer_nav_r() {
		wp_nav_menu(
			array(
				'container'      => false,
				'menu_class'     => 'dropdown menu desktop-menu align-right',
				'items_wrap'     => '<ul id="%1$s" class="%2$s footer-right-menu" >%3$s</ul>',
				'theme_location' => 'footer-nav-r',
				'depth'          => 3,
				'fallback_cb'    => false,
				'walker'         => new Foundationpress_Top_Bar_Walker(),
			)
		);
	}
}


/**
 * Mobile navigation - topbar (default) or offcanvas
 */
if ( ! function_exists( 'foundationpress_mobile_nav' ) ) {
	function foundationpress_mobile_nav() {
		wp_nav_menu(
			array(
				'container'      => false,                         // Remove nav container
				'menu'           => __( 'mobile-nav', 'foundationpress' ),
				'menu_class'     => 'vertical menu',
				'theme_location' => 'mobile-nav',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
				'fallback_cb'    => false,
				'walker'         => new Foundationpress_Mobile_Walker(),
			)
		);
	}
}

