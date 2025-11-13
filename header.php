<?php
use Selectrum\WalkerNavMenu;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php echo wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="format-detection" content="telephone=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="icon" type="image/x-icon" href="<?php echo selectrum_get_image_url('favicon/favicon.ico'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo selectrum_get_image_url('favicon/apple-touch-icon-57x57.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo selectrum_get_image_url('favicon/apple-touch-icon-114x114.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo selectrum_get_image_url('favicon/apple-touch-icon-72x72.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo selectrum_get_image_url( 'favicon/apple-touch-icon-144x144.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo selectrum_get_image_url('favicon/apple-touch-icon-60x60.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo selectrum_get_image_url( 'favicon/apple-touch-icon-120x120.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo selectrum_get_image_url('favicon/apple-touch-icon-76x76.png'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo selectrum_get_image_url( 'favicon/apple-touch-icon-152x152.png'); ?>" />
    <link rel="icon" type="image/png" href="<?php echo selectrum_get_image_url('favicon/favicon-196x196.png'); ?>" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?php echo selectrum_get_image_url( 'favicon/favicon-96x96.png'); ?>" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?php echo selectrum_get_image_url('favicon/favicon-32x32.png'); ?>" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo selectrum_get_image_url( 'favicon/favicon-16x16.png'); ?>" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?php echo selectrum_get_image_url('favicon/favicon-128.png'); ?>" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?php echo selectrum_get_image_url('favicon/mstile-144x144.png'); ?>" />
    <meta name="msapplication-square70x70logo" content="<?php echo selectrum_get_image_url('favicon/mstile-70x70.png'); ?>" />
    <meta name="msapplication-square150x150logo" content="<?php echo selectrum_get_image_url('favicon/mstile-150x150.png'); ?>" />
    <meta name="msapplication-wide310x150logo" content="<?php echo selectrum_get_image_url('favicon/mstile-310x150.png'); ?>" />
    <meta name="msapplication-square310x310logo" content="<?php echo selectrum_get_image_url('favicon/mstile-310x310.png'); ?>" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="site" id="site">

    <header id="siteHeader" class="siteHeader">
        <div class="container siteHeader__container">
            <div class="siteHeader__inner">
                <a class="siteHeader__logoContainer" href="<?php echo home_url(); ?>" title="<?php bloginfo( 'blog_name' ); ?>">
                    <img class="siteHeader__logoImage" src="<?php echo selectrum_get_image_url('logo.svg'); ?>" alt="<?php bloginfo( 'blog_name' ); ?>">
                </a>
                <div class="siteHeader__socials">
                    <?php get_template_part('parts/socials'); ?>
                </div>
                <button class="btnMenu" id="btnMenu">
                    <span class="btnMenu__hamburger"><span></span><span></span><span></span></span>
                </button>
            </div>
        </div>
    </header>


    <nav id="siteNav" class="siteNav">
        <div class="container siteNav__container">
            <div class="siteNav__inner">
                <div class="siteNav__inner2">
                    <?php
                    wp_nav_menu( array(
                            'theme_location' => 'secondary_menu',
                            'menu_class'     => 'secondaryMenu',
                            'container'      => false,
                            'walker'         => new WalkerNavMenu()
                    ) );
                    ?>

	                <?php
	                wp_nav_menu( array(
		                'theme_location' => 'primary_menu',
		                'menu_class'     => 'primaryMenu',
		                'container'      => false,
		                'walker'         => new WalkerNavMenu()
	                ) );
	                ?>
                </div>
            </div>
        </div>
    </nav>


    <div id="siteContent" class="siteContent">