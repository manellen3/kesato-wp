<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="Manellen">
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.png">
    <?php wp_head(); ?>
</head>
<?php $isloggedin = is_user_logged_in() ? "isLoggedIn" : ""; ?>

<body <?php body_class(); ?>>
    <div id="navMenu">
        <div class="man-container container mx-auto">
            <button id="toggleMenuClose" class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-times"></i>
                <span class="ml-3">Close</span>
            </button>
        </div>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container' => 'div',
            'container_class' => '',
            'container_id' => 'navbarSupportedContent',
            'menu_class' => 'navbar-nav text-center',
            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
            'walker' => new WP_Bootstrap_Navwalker(),
        ));
        ?>
    </div>
    <header class="man-header mb-auto w-100 fixed-top bg-transparent <?php echo $isloggedin; ?>">
        <div class="man-container container px-0 mx-auto d-flex justify-content-between">
            <nav class="man-navbar navbar navbar-dark bg-transparent">
                <a class="navbar-brand font-size-2 d-none" href="<?php echo esc_url(home_url('/')); ?>">
                    <i class="fas fa-hotel"></i>
                </a>
                <button id="toggleMenu" class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-left"></i>
                    <span class="ml-3">Menu</span>
                </button>
            </nav>
            <div class="man-selectLanguage dropdown pr-4">
                <button class="btn dropdown-toggle font-color-3" type="button" id="selectLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EN</button>
                <div class="dropdown-menu bg-dark" aria-labelledby="selectLanguage">
                    <a class="dropdown-item font-color-3" href="#">ID - Bahasa Indonesia</a>
                    <a class="dropdown-item font-color-3" href="#">EN - English</a>
                    <a class="dropdown-item font-color-3" href="#">FR - French</a>
                </div>
            </div>
        </div>
    </header>