<?php
$logos = $args['logos'] ?? [];
if ( empty( $logos ) ) {
    return;
}
?>
<div class="section">
    <div class="container">
        <div class="logos">
            <?php foreach ( $logos as $item ) : ?>
                <div class="logos__item">
                    <?php if ( !empty( $item['url'] ) ) : ?><a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank"><?php endif; ?>
                        <?php echo wp_get_attachment_image( $item['logo']['ID'], 'full' ); ?>
                    <?php if ( !empty( $item['url'] ) ) : ?></a><?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
