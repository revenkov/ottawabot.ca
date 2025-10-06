<?php
/**
 * Template Name: Events
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content_1 = get_field('content_1');
if ( !empty( $content_1 ) ) :
?>
<div class="section">
    <div class="container container--narrow">
        <?php echo $content_1; ?>
    </div>
</div>
<?php endif; ?>


<?php

?>
<div class="section">
    <div class="container">
        <h2 style="text-align: center;">BENEFITS OF ATTENDING</h2>
    </div>
</div>


<?php
$content_group_3 = get_field('content_group_3');
if ( !empty( $content_group_3 ) ) :
?>
<div class="section">
    <div class="container container--narrow">
        <?php echo $content_group_3['content']; ?>
    </div>
</div>
<?php endif; ?>


<?php
$content_group_4 = get_field('content_group_4');
$map = get_field('map');
if ( !empty( $content_group_3 ) ) :
?>
<div class="section">
    <div class="container">
        <div class="mapBlock">
            <div class="mapBlock__mapCol">
                <?php if ( !empty($map['desktop']) ) : ?>
                    <div class="imageBlock">
                        <picture>
                            <?php if ( !empty( $map['mobile'] ) ) : ?><source media="(max-width: 639px)" srcset="<?php echo wp_get_attachment_image_srcset( $map['mobile']['ID'], 'full' ); ?>" sizes="<?php echo wp_get_attachment_image_sizes( $map['mobile']['ID'], 'full' ); ?>"><?php endif; ?>
                            <?php if ( !empty( $map['tablet'] ) ) : ?><source media="(max-width: 1119px)" srcset="<?php echo wp_get_attachment_image_srcset( $map['tablet']['ID'], 'full' ); ?>" sizes="<?php echo wp_get_attachment_image_sizes( $map['tablet']['ID'], 'full' ); ?>"><?php endif; ?>
                            <?php echo wp_get_attachment_image( $map['desktop']['ID'], 'full'); ?>
                        </picture>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mapBlock__textCol">
                <div class="mapBlock__textContainer">
                    <?php echo $content_group_4['content']; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php
$carousel = get_field('carousel');
if ( !empty( $carousel ) ) :
?>
<div class="section">
    <div class="container">
        <div class="logoTextSlider">
            <div class="logoTextSlider__slides">
                <?php foreach ( $carousel as $item ) : ?>
                    <div class="logoTextSlider__slide">
                        <div class="logoTextSlide">
                            <div class="logoTextSlide__logoCol"><?php echo wp_get_attachment_image( $item['logo']['ID'], 'full' ); ?></div>
                            <div class="logoTextSlide__textCol"><?php echo $item['content']; ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php
$testimonials = get_field('featured_testimonials');
if ( !empty( $testimonials ) ) :
?>
<div class="section">
    <div class="container container--wide">
        <div class="testimonials">
            <h2 class="testimonials__title">TESTIMONIALS</h2>

            <?php get_template_part('parts/testimonials', false, ['testimonials' => $testimonials]); ?>
        </div>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>