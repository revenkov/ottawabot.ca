<?php
/**
 * Template Name: Our story
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content = get_field('content');
$timeline = get_field('timeline');
?>
<div class="section">
    <div class="container container--middle">
        <?php echo $content; ?>

        <?php if ( !empty( $timeline ) ) : ?>
        <div class="story">
            <?php foreach ( $timeline as $item ) : ?>
                <div class="story__item">
                    <div class="story__itemIcon" style="--icon-url: url('<?php echo $item['icon']['url']; ?>');"></div>
                    <div class="story__itemInner">
                        <?php echo $item['content']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>


<?php get_footer(); ?>
