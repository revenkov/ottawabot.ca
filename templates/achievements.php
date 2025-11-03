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
        <div class="textBlock" data-aos="fade-up"><?php echo $content; ?></div>
    </div>
</div>
<?php endif; ?>


<?php
$timeline = get_field('timeline');
if ( !empty( $timeline ) ) :
?>
<div class="section">
    <div class="container container--wide">
        <div class="timeline" data-aos="fade-up">
            <div class="timeline__nav">
                <ul class="timeline__navList">
                    <?php foreach ( $timeline as $key=>$item ) : ?>
                        <li class="timeline__navItem" style="--color: #<?php echo $item['color']; ?>">
                            <button class="timeline__navButton <?php echo $key === 0 ? 'active' : false; ?>" type="button" data-id="<?php echo $item['year']; ?>">
                                <span class="timeline__navTitle"><?php echo $item['year']; ?></span>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="timeline__items">
                <?php foreach ( $timeline as $item ) : ?>
                    <div class="timeline__item" id="<?php echo $item['year']; ?>" style="--color: #<?php echo $item['color']; ?>">
                        <div class="timeline__itemHeader">
                            <h2 class="timeline__title" style="color: #<?php echo $item['color']; ?>"><?php echo $item['year']; ?></h2>
                        </div>

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
