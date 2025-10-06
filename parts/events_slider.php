<?php
$events = $args['events'] ?? [];
if ( empty( $events ) ) {
    return;
}
?>
<div class="eventsSlider">
    <div class="eventsSlider__slides">
        <?php
        foreach ( $events as $post ) :
            setup_postdata( $post );
            $image = get_field('image');
            $date = get_field('date');
            $excerpt = get_field('excerpt');
            $content = get_field('content');
            ?>
            <div class="eventsSlider__slide">
                <div class="eventSlide">
                    <div class="eventSlide__imageCol"><?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?></div>
                    <div class="eventSlide__textCol">
                        <h3 class="eventSlide__title"><?php echo get_the_title(); ?></h3>
                        <div class="eventSlide__date"><?php echo $date; ?></div>
                        <p><?php echo $excerpt; ?></p>
                    </div>
                    <?php if ( !empty($content) ) : ?>
                    <a href="<?php echo get_the_permalink(); ?>" class="eventSlide__link" title="Read more"></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; wp_reset_postdata(); ?>
    </div>
</div>
