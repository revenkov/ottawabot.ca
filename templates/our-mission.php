<?php
/**
 * Template Name: Our Mission
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content = get_field('content_1');
if ( !empty( $content) ) :
?>
<div class="section">
    <div class="container container--narrow" data-aos="fade-up">
        <?php echo $content; ?>
    </div>
</div>
<?php endif; ?>


<?php
$content = get_field('content_2');
$icon_cards = get_field('icon_cards');
?>
<div class="section">
    <div class="container container--narrow" data-aos="fade-up">
        <?php echo $content; ?>
    </div>

    <?php if ( !empty( $icon_cards ) ) : ?>
        <div class="container">
            <div class="carousel" data-aos="fade-up">
                <div class="carousel__slides">
                    <?php foreach ( $icon_cards as $item ) : ?>
                        <div>
                            <div class="carousel__slide">
                                <div class="iconCard">
                                    <div class="iconCard__icon" style="--icon-url: url(<?php echo $item['icon']['url'] ?>);"></div>
                                    <?php echo $item['content']; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>


<?php
$content = get_field('content_3');
if ( !empty( $content ) ) :
?>
<div class="section">
    <div class="container container--narrow" data-aos="fade-up">
        <?php echo $content; ?>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>
