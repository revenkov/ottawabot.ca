<?php
/**
 * Template Name: Membership levels
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
$membership_levels = get_field('membership_levels');
if ( !empty( $membership_levels ) ) :
?>
<div class="section">
    <div class="container container--wide">
        <div class="timeline">
            <div class="timeline__nav">
                <ul class="timeline__navList">
                    <?php foreach ( $membership_levels as $key=>$item ) : ?>
                        <li class="timeline__navItem" style="--color: #<?php echo $item['color']; ?>;">
                            <button class="timeline__navButton <?php echo $key === 0 ? 'active' : false; ?>" type="button" data-id="<?php echo sanitize_title($item['title']); ?>">
                                <span class="timeline__navIcon" style="--icon: url( <?php echo $item['icon']['url']; ?> );"></span>
                                <span class="timeline__navTitle"><?php echo $item['title']; ?></span>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="timeline__items">
                <?php foreach ( $membership_levels as $item ) : ?>
                    <div class="timeline__item" id="<?php echo sanitize_title($item['title']); ?>">
                        <div class="timeline__itemHeader">
                            <h2 class="timeline__title" style="color: #<?php echo $item['color']; ?>"><?php echo $item['title']; ?></h2>
                            <div class="timeline__itemHeaderDivider"></div>
                            <div class="h2 timeline__price"><?php echo $item['price']; ?></div>
                        </div>

                        <?php echo $item['content']; ?>

                        <?php get_template_part('parts/button', false, $item['button']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>
