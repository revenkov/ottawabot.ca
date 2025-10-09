<?php
/**
 * Template Name: Buy local
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content_1 = get_field('content_1');
$icon_cards = get_field('icon_cards');
?>
<div class="section">
    <?php if ( !empty( $content_1 ) ) : ?>
    <div class="container container--narrow">
        <?php echo $content_1; ?>
    </div>
    <?php endif; ?>

    <?php if ( !empty( $icon_cards ) ) : ?>
    <div class="container container--middle">
        <div class="iconCards2">
            <div class="iconCards2__items">
                <?php foreach ( $icon_cards as $item ) : ?>
                    <div class="iconCards2__item">
                        <div class="iconCard2">
                            <div class="iconCard2__header">
                                <div class="iconCard2__icon" style="--icon-url: url(<?php echo $item['icon']['url'] ?>);"></div>
                                <h3 class="iconCard2__title"><?php echo $item['title']; ?></h3>
                            </div>
                            <?php echo $item['content']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>


<?php
$content_2 = get_field('content_2');
$files = get_field('files');
$content_3 = get_field('content_3');
?>
<div class="section">
    <div class="container container--narrow">
        <?php echo $content_2; ?>

        <?php if ( !empty( $files ) ) : ?>
        <p class="buttons">
            <?php foreach ( $files as $item ) : ?>
                <a class="button" href="<?php echo $item['file']['url']; ?>" target="_blank"><?php echo $item['button_label']; ?></a>
            <?php endforeach; ?>
        </p>
        <?php endif; ?>

        <?php echo $content_3; ?>
    </div>
</div>


<?php
$logos = get_field('logos') ?? [];
if ( !empty( $logos ) ) :
?>
<div class="section">
    <div class="container container--wide">
        <h2 style="text-align: center">Local Business Directories</h2>

        <?php get_template_part('parts/logos', false, ['logos' => $logos]); ?>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>
