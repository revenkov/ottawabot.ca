<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$image = get_field('image');
$content = get_field('content');
?>
<div class="section">
    <div class="container container--wide">
        <div class="eventContent">
            <div class="eventContent__col1">
                <div class="imageBlock imageBlock--square"><?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?></div>
            </div>
            <div class="eventContent__col2">
                <div class="eventContent__textContainer">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
