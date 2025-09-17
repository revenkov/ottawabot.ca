    </div>

    <?php
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
    ?>
    <footer class="siteFooter">
        <div class="container">
            <div class="siteFooter__inner">
                <a class="siteFooter__logoContainer" href="<?php echo home_url(); ?>" title="<?php bloginfo( 'blog_name' ); ?>">
                    <img class="siteFooter__logoImage" src="<?php echo selectrum_get_image_url('logo.svg'); ?>" alt="<?php bloginfo( 'blog_name' ); ?>">
                </a>
                <div class="siteFooter__contacts">
		            <?php if ( !empty( $phone ) ) : ?><div class="siteFooter__phone"><a href="tel:+1<?php echo preg_replace("/[^0-9]/", "", $phone); ?>"><?php echo $phone; ?></a></div><?php endif; ?>
		            <?php if ( !empty( $email ) ) : ?><div class="siteFooter__email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div><?php endif; ?>
		            <?php if ( !empty( $address ) ) : ?><div class="siteFooter__address"><a href="//google.com/maps?q=<?php echo strip_tags(urlencode($address)); ?>" target="_blank"><?php echo $address; ?></a></div><?php endif; ?>
                </div>
                <div class="siteFooter__socials">
		            <?php if (!empty($facebook)) : ?><a href="<?php echo $facebook; ?>" target="_blank" class="social social--facebook" title="<?php echo __('Follow us on Facebook', 'selectrum'); ?>"></a><?php endif; ?>
		            <?php if (!empty($x)) : ?><a href="<?php echo $x; ?>" target="_blank" class="social social--x" title="<?php echo __('Follow us on X', 'selectrum'); ?>"></a><?php endif; ?>
		            <?php if (!empty($youtube)) : ?><a href="<?php echo $youtube; ?>" target="_blank" class="social social--youtube" title="<?php echo __('Follow us on Youtube', 'selectrum'); ?>"></a><?php endif; ?>
		            <?php if (!empty($instagram)) : ?><a href="<?php echo $instagram; ?>" target="_blank" class="social social--instagram" title="<?php echo __('Follow us on Instagram', 'selectrum'); ?>"></a><?php endif; ?>
		            <?php if (!empty($linkedin)) : ?><a href="<?php echo $linkedin; ?>" target="_blank" class="social social--linkedin" title="<?php echo __('Follow us on Linkedin', 'selectrum'); ?>"></a><?php endif; ?>
		            <?php if (!empty($tiktok)) : ?><a href="<?php echo $tiktok; ?>" target="_blank" class="social social--tiktok" title="<?php echo __('Follow us on TikTok', 'selectrum'); ?>"></a><?php endif; ?>
                </div>
                <div class="siteFooter__copyright">
                    &copy; <?php echo date('Y'); ?> <?php echo __('All Rights Reserved.', 'selectrum'); ?> <span class="sep">|</span> <?php echo sprintf( __('Website by %s', 'selectrum'), '<a href="https://www.selectrum.com/" target="_blank">Selectrum Communications</a>'); ?>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

    </div>

</body>
</html>
