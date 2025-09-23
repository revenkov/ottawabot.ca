</div>



    <?php

    use Selectrum\WalkerNavMenu;

    $address = get_field('address', 'options');
    $phone = get_field('phone', 'options');
    $email = get_field('email', 'options');
    $facebook = get_field('facebook', 'options');
    $x = get_field('x', 'options');
    $linkedin = get_field('linkedin', 'options');
    $instagram = get_field('instagram', 'options');
    $youtube = get_field('youtube', 'options');
    $tiktok = get_field('tiktok', 'options');
    $pinterest = get_field('pinterest', 'options');
    $logos = get_field('logos', 'options');
    ?>
    <footer class="siteFooter">
        <div class="container">
            <div class="newsletterBlock">
                <div class="newsletterBlock__inner">
                    <h3 class="newsletterBlock__title"><?php echo __('Sign Up For Updates', 'selectrum'); ?></h3>
                    <form class="newsletterBlock__form">
                        <div class="newsletterBlock__formField">
                            <label class="newsletterBlock__formFieldLabel screen-reader-text" for="newsletterEmail"><?php echo __('Your Email', 'selectrum'); ?></label>
                            <input class="newsletterBlock__formFieldInput" id="newsletterEmail" type="email" placeholder="<?php echo __('Your Email', 'selectrum'); ?>">
                        </div>
                        <button class="newsletterBlock__formButton" title="<?php echo __('Submit', 'selectrum'); ?>"></button>
                    </form>
                    <div class="newsletterBlock__text"><?php echo __('Get news, insights, and exclusive perks—right to your inbox!', 'selectrum'); ?></div>
                </div>
            </div>

            <div class="siteFooter__inner">
                <div class="h1 siteFooter__slogan"><?php echo __('The Voice of Business for Ottawa', 'selectrum'); ?></div>
                <div class="siteFooter__cols">
                    <div class="siteFooter__col">
                        <div class="siteFooter__colTitle text-md"><?php echo __('Quicklinks', 'selectrum'); ?></div>
                        <div class="siteFooter__colContent">
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'footer_menu',
                                'menu_class'     => 'footerMenu',
                                'container'      => false,
                                'walker'         => new WalkerNavMenu()
                            ) );
                            ?>
                        </div>
                    </div>
                    <div class="siteFooter__col">
                        <div class="siteFooter__colTitle text-md"><?php echo __('Ottawa Board of Trade', 'selectrum'); ?></div>
                        <div class="siteFooter__colContent">
                            <?php if ( !empty( $address ) ) : ?><div class="siteFooter__address"><a href="//google.com/maps?q=<?php echo strip_tags(urlencode($address)); ?>" target="_blank"><?php echo $address; ?></a></div><?php endif; ?>

                            <div class="siteFooter__contacts">
                                <?php if ( !empty( $phone ) ) : ?><div class="siteFooter__phone"><a href="tel:+1<?php echo preg_replace("/[^0-9]/", "", $phone); ?>"><?php echo $phone; ?></a></div><?php endif; ?>
                                <span class="siteFooter__divider"></span>
                                <?php if ( !empty( $email ) ) : ?><div class="siteFooter__email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div><?php endif; ?>
                            </div>

                            <div class="siteFooter__socials">
                                <?php get_template_part('parts/socials'); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ( !empty( $logos ) ) :
                    ?>
                    <div class="siteFooter__col">
                        <div class="siteFooter__colTitle text-md"><?php echo __('Proud Member', 'selectrum'); ?></div>
                        <div class="siteFooter__colContent">
                            <div class="siteFooter__logos">
                                <?php foreach ( $logos as $logo ) : ?>
                                <div class="siteFooter__logo">
                                    <a href="<?php echo $logo['url']; ?>" target="_blank">
                                        <?php echo wp_get_attachment_image( $logo['logo']['ID'], 'full' ); ?>
                                    </a>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="siteFooter__copyright">
                    <span>&copy; <?php echo date('Y'); ?> <?php echo __('Ottawa Board of Trade', 'selectrum'); ?></span> <span class="siteFooter__divider"></span> <?php echo __('All Rights Reserved', 'selectrum'); ?> <span class="siteFooter__divider"></span> <a href="<?php echo get_privacy_policy_url(); ?>"><?php echo __('Privacy Policy', 'selectrum'); ?></a>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

    </div>

</body>
</html>
