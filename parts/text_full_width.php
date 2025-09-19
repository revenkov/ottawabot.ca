<?php
$content = $args['content'];
if ( empty( $content ) ) {
    return;
}
?>
<div class="section">
    <div class="container container--narrow" data-aos="fade-up">
        <div class="textBlock"><?php echo $content; ?></div>
    </div>
</div>
