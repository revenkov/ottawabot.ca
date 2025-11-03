<?php
$logos = $args['logos'] ?? [];
if ( empty( $logos ) ) {
    return;
}
?>
<div class="logosCarousel">
    <div class="logosCarousel__slides">
        <?php foreach ( $logos as $item ) : ?>
            <div class="logosCarousel__slide">
                <div class="logosCarousel__item" data-aos="fade-up">
                    <?php if ( !empty( $item['url'] ) ) : ?><a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank"><?php endif; ?>
                        <?php echo wp_get_attachment_image( $item['logo']['ID'], 'full' ); ?>
                    <?php if ( !empty( $item['url'] ) ) : ?></a><?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
