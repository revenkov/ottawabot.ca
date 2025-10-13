<?php
$testimonials = $args['testimonials'];
if ( empty( $testimonials ) ) {
    return;
}
?>
<div class="testimonialsSlider" data-aos="fade-up">
    <div class="testimonialsSlider__slides">
        <?php
        foreach ( $testimonials as $post ) :
            setup_postdata( $post );
            $highlight_text = get_field('highlight_text');
            $testimonial = get_field('testimonial');
            ?>
            <div>
                <div class="testimonialsSlider__slide">
                    <div class="testimonialsSlider__highlightText text-lg"><?php echo $highlight_text; ?></div>
                    <div class="testimonialsSlider__testimonial">
                        <div class="testimonialsSlider__testimonialText"><?php echo $testimonial; ?></div>
                        <div class="testimonialsSlider__testimonialAuthor">– <?php echo get_the_title(); ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; wp_reset_postdata(); ?>
    </div>
</div>