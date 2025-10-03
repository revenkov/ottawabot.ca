<?php
$logos = $args['logos'] ?? [];
if ( empty( $logos ) ) {
    return;
}
?>
<div class="section">
    <div class="container">
        <?php get_template_part( 'parts/logos', false, [ 'logos' => $logos ] ); ?>
    </div>
</div>
