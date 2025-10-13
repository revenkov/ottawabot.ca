<?php
/**
 * Template Name: Pillar partners
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content_1 = get_field('content_1');
$icon_cards = get_field('icon_cards');
$content_2 = get_field('content_2');
?>
<div class="section">
    <?php if ( !empty( $content_1 ) ) : ?>
    <div class="container container--narrow" data-aos="fade-up">
        <?php echo $content_1; ?>
    </div>
    <?php endif; ?>

    <?php if ( !empty( $icon_cards ) ) : ?>
    <div class="container container--wide">
        <div class="iconCards">
            <div class="iconCards__items">
                <?php foreach ( $icon_cards as $item ) : ?>
                    <div class="iconCards__item" data-aos="fade-up">
                        <div class="iconCard">
                            <div class="iconCard__icon" style="--icon-url: url(<?php echo $item['icon']['url'] ?>);"></div>
                            <?php echo $item['content']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if ( !empty( $content_2 ) ) : ?>
        <div class="container container--narrow" data-aos="fade-up">
            <?php echo $content_2; ?>
        </div>
    <?php endif; ?>

    <?php
    $logos = get_field('logos') ?? [];
    if ( !empty( $logos ) ) :
    ?>
    <div class="container">
        <?php get_template_part('parts/logos', false, ['logos' => $logos]); ?>
    </div>
    <?php endif; ?>
</div>


<?php get_footer(); ?>
