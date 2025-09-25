<?php
/**
 * Template Name: Podcast
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content = get_field('content_1');
if ( !empty( $content ) ) :
?>
<div class="section">
    <div class="container container--narrow">
        <div class="textBlock"><?php echo $content; ?></div>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>
