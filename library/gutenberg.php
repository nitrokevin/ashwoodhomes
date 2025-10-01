<?php

if ( ! function_exists( 'foundationpress_gutenberg_support' ) ) :
	function foundationpress_gutenberg_support() {
        // Load color array from separate file
        include 'colors.php';

        $editor_colors = array();

        foreach ( $colors as $slug => $color ) {
            // Convert slug to a readable label: e.g., 'theme-color-1' -> 'Theme Color 1'
            $name = ucwords(str_replace(array('-', '_'), ' ', $slug));

            $editor_colors[] = array(
                'name'  => __( $name, 'foundationpress' ),
                'slug'  => $slug,
                'color' => $color,
            );
        }

        add_theme_support( 'editor-color-palette', $editor_colors );
	}

	add_action( 'after_setup_theme', 'foundationpress_gutenberg_support' );
endif;