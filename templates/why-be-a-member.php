<?php
/**
 * Template Name: Why be a member
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content = get_field('content');
if ( !empty( $content ) ) :
?>
<div class="section">
    <div class="container container--narrow">
        <div class="textBlock"><?php echo $content; ?></div>
    </div>
</div>
<?php endif; ?>


<?php
$icon_cards = get_field('icon_cards');
if ( !empty( $icon_cards ) ) :
?>
<div class="section">
    <div class="container">
        <div class="carousel">
            <div class="carousel__slides">
                <?php foreach ( $icon_cards as $item ) : ?>
                    <div>
                        <div class="carousel__slide">
                            <div class="carousel__slideIcon" style="--icon-url: url(<?php echo $item['icon']['url'] ?>);"></div>
                            <?php echo $item['content']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php
$cta_group = get_field('cta_group');
if ( !empty( $cta_group ) ) :
?>
<div class="section">
    <div class="container">
        <div class="ctaBlock">
            <div class="ctaBlock__inner">
                <?php echo $cta_group['content']; ?>

                <?php get_template_part('parts/button', false, $cta_group['button']); ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>
