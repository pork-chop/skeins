<?php
add_action( 'init', 'custom_remove_storefront_site_branding', 10 );
add_action( 'init', 'custom_edit_storefront_footer', 10 );
add_action( 'init', 'rearrange_homepage_content', 10 );

// HEADER
function custom_remove_storefront_site_branding() {
    remove_action( 'storefront_header', 'storefront_site_branding', 20 );
    add_action( 'storefront_header', 'custom_storefront_site_branding', 20 );
}

function custom_storefront_site_branding() { ?>
    <div class="site-branding">
        <h1 class="site-title hidetext"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <p class="site-description"><?php bloginfo( 'description' ); ?></p>
    </div>
<?php }


// HOMEPAGE
function rearrange_homepage_content() {
    add_action( 'homepage', 'storefront_homepage_content',		10 );
    remove_action( 'homepage', 'storefront_product_categories',	20 );
    remove_action( 'homepage', 'storefront_recent_products',		30 );
    add_action( 'homepage', 'storefront_featured_products',		40 );
    remove_action( 'homepage', 'storefront_popular_products',		50 );
    remove_action( 'homepage', 'storefront_on_sale_products',		60 );
}

// FOOTER
function custom_edit_storefront_footer() {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer', 'storefront_custom_credit', 20 );
}

function storefront_custom_credit() { ?>
    <div class="site-info">
        <?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>
        <?php if ( apply_filters( 'storefront_credit_link', true ) ) { ?>
        <br /> Parent theme <?php printf( __( '%1$s designed by %2$s.', 'storefront' ), 'Storefront', '<a href="http://www.woothemes.com" alt="Premium WordPress Themes & Plugins by WooThemes" title="Premium WordPress Themes & Plugins by WooThemes" rel="designer">WooThemes</a>' ); ?> Modified for <a href="/">Skeins</a> by <a href="http://amydalrymple.org">Amy Dalrymple</a>.
        <?php } ?>
    </div><!-- .site-info -->
<?php
}