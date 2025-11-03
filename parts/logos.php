<?php
$logos = $args['logos'] ?? [];
if ( empty( $logos ) ) {
    return;
}
?>
<div class="logos">
    <div class="logos__items">
        <?php foreach ( $logos as $item ) : ?>
            <div class="logos__item" data-aos="fade-up">
                <?php if ( !empty( $item['url'] ) ) : ?><a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank"><?php endif; ?>
                    <?php echo wp_get_attachment_image( $item['logo']['ID'], 'full' ); ?>
                    <?php if ( !empty( $item['title'] ) ) : ?>
                        <span class="logos__itemTitle"><?php echo $item['title']; ?></span>
                    <?php endif; ?>
                    <?php if ( !empty( $item['url'] ) ) : ?></a><?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>