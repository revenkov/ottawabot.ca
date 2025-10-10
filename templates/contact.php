<?php
/**
 * Template Name: Contact
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$address = get_field('address', 'options');
$phone = get_field('phone', 'options');
$email = get_field('email', 'options');
$other_contact_categories = get_field('other_contact_categories');
?>
<div class="section">
    <div class="container container--wide">
        <div class="contacts">
            <div class="contacts__col1">
                <h2 class="contacts__title">Ottawa Board of Trade</h2>
                <div class="contacts__address">
                    <a href="https://maps.app.goo.gl/pwmZ5q1pPVSdCLsf7" target="_blank"><?php echo $address; ?></a>
                </div>
                <div class="contacts__categoryTitle text-md">General Inquiries</div>
                <?php if ( !empty( $phone ) ) : ?>
                    <div class="contacts__phone"><a href="tel:+1<?php echo preg_replace("/[^0-9]/", "", $phone); ?>"><?php echo $phone; ?></a></div>
                <?php endif; ?>
                <?php if ( !empty( $email ) ) : ?>
                    <div class="contacts__email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
                <?php endif; ?>
            </div>
            <div class="contacts__divider"></div>
            <div class="contacts__col2">
                <?php foreach ( $other_contact_categories as $item ) : ?>
                    <div class="contacts__category">
                        <div class="contacts__categoryTitle text-md"><?php echo $item['category']; ?></div>
                        <div class="contacts__categoryContactName"><?php echo $item['full_name']; ?></div>
                        <div class="contacts__categoryContactTitle"><?php echo $item['title']; ?></div>
                        <a href="mailto:<?php echo $item['email']; ?>"><?php echo $item['email']; ?></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="contactFormBlock">
            <div class="contactFormBlock__intro">
                <p>Send us your questions or comments using the form below. We will respond promptly to your inquiry.</p>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="b86d9e1" title="Contact form"]'); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
