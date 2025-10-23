<?php
if ( has_post_thumbnail( $post->ID ) ) :
    $sizes = array(
        'featured-small' => esc_url( get_the_post_thumbnail_url( $post->ID, 'featured-small' ) ),
        'featured-medium' => esc_url( get_the_post_thumbnail_url( $post->ID, 'featured-medium' ) ),
        'featured-large' => esc_url( get_the_post_thumbnail_url( $post->ID, 'featured-large' ) ),
        'featured-xlarge' => esc_url( get_the_post_thumbnail_url( $post->ID, 'featured-xlarge' ) ),
    );

    $is_front = is_front_page();
    $hero_class = $is_front ? 'front-hero' : 'featured-hero';
    ?>
    <header class="<?php echo $hero_class; ?>"  data-interchange="[<?php echo $sizes['featured-small']; ?>, small], [<?php echo $sizes['featured-medium']; ?>, medium], [<?php echo $sizes['featured-large']; ?>, large], [<?php echo $sizes['featured-xlarge']; ?>, xlarge]" data-type="background">
        <?php if ( $is_front ) : ?>
             <div class="marketing-container">
        <div class="marketing">
            <div class="tagline">
                <h1><?php echo esc_html( get_bloginfo( 'name' ) ); ?> community feedback hub</h1>
                <p class="subheader"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
                 <a href="<?php echo esc_url( get_theme_mod( 'global_link' ) ); ?>" class="button large secondary">Have your say</a>
            </div>
        </div>
             </div>
        <?php endif; ?>
    </header>
<?php endif; ?>