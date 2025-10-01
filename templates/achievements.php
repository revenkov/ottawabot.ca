<?php
/**
 * Template Name: Achievements
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
$timeline = get_field('timeline');
if ( !empty( $timeline ) ) :
?>
<div class="section">
    <div class="container container--wide">
        <div class="timeline">
            <div class="timeline__nav">
                <ul>
                    <?php foreach ( $timeline as $key=>$item ) : ?>
                        <li class="h4"><a class="<?php echo $key === 0 ? 'active' : false; ?>" href="javascript:" data-id="<?php echo $item['year']; ?>" style="--color: #<?php echo $item['color']; ?>"><?php echo $item['year']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="timeline__items">
                <?php foreach ( $timeline as $item ) : ?>
                    <div class="timeline__item" id="<?php echo $item['year']; ?>">
                        <?php echo $item['content']; ?>

                        <div class="accordion">
                            <?php foreach ( $item['accordions'] as $accordion ) : ?>
                                <div class="accordion__header">
                                    <div class="accordion__title h4"><?php echo $accordion['title']; ?></div>
                                </div>
                                <div class="accordion__body">
                                    <div class="accordion__bodyInner"><?php echo $accordion['content']; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>
