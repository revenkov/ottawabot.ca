<?php
/**
 * Template Name: Policy position
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content_1 = get_field('content_1');
if ( !empty( $content_1 ) ) :
?>
<div class="section">
    <div class="container container--narrow" data-aos="fade-up">
        <?php echo $content_1; ?>
    </div>
</div>
<?php endif; ?>


<?php
$content_2 = get_field('content_2');
$links = get_field('links');
?>
<div class="section">
    <div class="container container--narrow" data-aos="fade-up">
        <?php echo $content_2; ?>

        <?php
        if ( !empty( $links ) ) :
            foreach ( $links as $item ) :
                ?>
                <p>
                    <a class="link" href="<?php echo $item['link']['url']; ?>" target="<?php echo $item['link']['target'] ?? '_self'; ?>"><span></span><?php echo $item['link']['title']; ?></a>
                </p>
                <?php
            endforeach;
        endif;
        ?>
    </div>
</div>


<?php get_template_part('parts/builder'); ?>


<?php get_footer(); ?>
