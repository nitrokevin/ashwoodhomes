<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
$footer_phone = get_theme_mod('footer_phone_number');
$footer_email = get_theme_mod('footer_email');
$footer_company_number = get_theme_mod('footer_company_number');
$footer_copyright = get_theme_mod('footer_copyright');
$footer_address_1 = get_theme_mod('footer_address_1');
$footer_address_2 = get_theme_mod('footer_address_2');
$footer_address_3 = get_theme_mod('footer_address_3');
$footer_address_4 = get_theme_mod('footer_address_4');
$footer_address_5 = get_theme_mod('footer_address_5');
$footer_address_6 = get_theme_mod('footer_address_6');
$footer_background_image = get_theme_mod('footer_background_image');
$site_name = get_bloginfo('name', 'display');

$socials = [
    'facebook' => get_theme_mod('social-facebook-url'),
    'x' => get_theme_mod('social-x-url'),
    'instagram' => get_theme_mod('social-instagram-url'),
    'linkedin' => get_theme_mod('social-linkedin-url'),
    'pinterest' => get_theme_mod('social-pinterest-url'),
    'youtube' => get_theme_mod('social-youtube-url'),
    'tiktok' => get_theme_mod('social-tiktok-url'),
];

$social_icons = [
    'facebook' => 'fab fa-facebook-f fa-fw',
    'x' => 'fab fa-x-twitter fa-fw',
    'instagram' => 'fab fa-instagram fa-fw',
    'linkedin' => 'fab fa-linkedin-in fa-fw',
    'pinterest' => 'fab fa-pinterest fa-fw',
    'youtube' => 'fab fa-youtube fa-fw',
    'tiktok' => 'fab fa-tiktok fa-fw',
];

if ($footer_background_image) {
    $sizes = [
        'small' => wp_get_attachment_image_url($footer_background_image, 'fp-small'),
        'medium' => wp_get_attachment_image_url($footer_background_image, 'fp-medium'),
        'large' => wp_get_attachment_image_url($footer_background_image, 'fp-large'),
        'xlarge' => wp_get_attachment_image_url($footer_background_image, 'fp-xlarge'),
    ];
}

?>

<footer class="footer" <?php if ($footer_background_image) { ?> data-interchange="[<?php echo esc_url($sizes['small']); ?>, small], [<?php echo esc_url($sizes['medium']); ?>, medium], [<?php echo esc_url($sizes['large']); ?>, large], [<?php echo esc_url($sizes['xlarge']); ?>, xlarge]" data-type="background"<?php } ?>>
    <div class="footer-container">
        <div class="footer-grid">
            <?php dynamic_sidebar('footer-widgets'); ?>
        </div>
        <div class="footer-grid">

            <section>
                <?php foundationpress_footer_nav_l(); ?>
                <ul class="footer-contact menu  footer-menu">
                    <li><?php echo esc_html($footer_address_1); ?></li>
                    <li><?php echo esc_html($footer_address_2); ?></li>
                    <li><?php echo esc_html($footer_address_3); ?></li>
                    <li><?php echo esc_html($footer_address_4); ?></li>
                    <li><?php echo esc_html($footer_address_5); ?></li>
                    <li><?php echo esc_html($footer_address_6); ?></li>
                    <li>&copy; <?php echo esc_html($site_name) . ' ' . date('Y'); ?></li>
                </ul>

            </section>
            <section>
                <ul class="social-links menu  footer-menu align-center">
                    <?php foreach ($social_icons as $key => $icon_class) : ?>
                        <?php if (!empty($socials[$key])) : ?>
                            <li><a href="<?php echo esc_url($socials[$key]); ?>" rel="noreferrer" target="_blank" aria-label="<?php echo ucfirst($key); ?>">
                                    <i class="<?php echo esc_attr($icon_class); ?>"></i>
                                </a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </section>
            <section>
                <?php foundationpress_footer_nav_r(); ?>
                <?php
                $footer_links = get_theme_mod('footer_links');
                if ($footer_links) { ?>
                    <div class="footer-links">
                        <?php
                        foreach ($footer_links as $footer_link) : ?>
                            <a href="<?php echo esc_url($footer_link['link_url']); ?>">
                                <?php echo wp_get_attachment_image($footer_link['footer_image'], 'thumbnail', false, ["class" => "footer-icon"]); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php } ?>
            </section>
        </div>
    </div>
</footer>

<?php if (get_theme_mod('wpt_mobile_menu_layout') === 'offcanvas') : ?>
    </div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>