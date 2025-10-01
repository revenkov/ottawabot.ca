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
                <ul>
                    <?php foreach ( $membership_levels as $key=>$item ) : ?>
                        <li class="h3"><a class="<?php echo $key === 0 ? 'active' : false; ?>" href="javascript:" data-id="<?php echo sanitize_title($item['title']);; ?>" style="--color: #<?php echo $item['color']; ?>"><?php echo $item['title']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="timeline__items">
                <?php foreach ( $membership_levels as $item ) : ?>
                    <div class="timeline__item" id="<?php echo sanitize_title($item['title']); ?>">
                        <?php echo $item['content']; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>
