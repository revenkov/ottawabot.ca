<?php
$image = $args['image'] ?? false;
$content = $args['content'] ?? '';
$button = $args['button'] ?? false;
$image_position = $args['image_position'];
?>
<div class="section">
    <div class="container">
        <div class="textImageBlock textImageBlock--<?php echo $image_position; ?>">
            <div class="textImageBlock__cols">
                <div class="textImageBlock__textCol" data-aos="fade-up">
                    <div class="textImageBlock__textWrapper">
                        <div class="textImageBlock__textInner">
                            <div class="textImageBlock__textInner2">
                                <?php echo $content; ?>

                                <?php get_template_part('parts/button', false, $button); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="textImageBlock__imageCol" data-aos="fade-up">
                    <?php if ( !empty($image) ) : ?>
                        <div class="imageBlock imageBlock--formatted"><?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>