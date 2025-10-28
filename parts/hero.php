<?php
global $post;
$hero_images = get_field('hero_images', selectrum_get_hero_image_post_id());
$desktop = $hero_images['desktop']['ID'] ?? 3058;
$tablet = $hero_images['tablet']['ID'] ?? ($desktop ? false : 3056);
$mobile = $hero_images['mobile']['ID'] ?? ($desktop ? false : 3057);
?>
<div class="container container--fullWidth test">
    <div class="hero">
        <?php if ( !empty( $desktop ) ) : ?>
            <div class="hero__imageContainer">
                <picture>
                    <?php if ( !empty( $mobile ) ) : ?><source media="(max-width: 639px)" srcset="<?php echo wp_get_attachment_image_srcset( $mobile, 'full' ); ?>" sizes="<?php echo wp_get_attachment_image_sizes( $mobile, 'full' ); ?>"><?php endif; ?>
                    <?php if ( !empty( $tablet ) ) : ?><source media="(max-width: 1259px)" srcset="<?php echo wp_get_attachment_image_srcset( $tablet, 'full' ); ?>" sizes="<?php echo wp_get_attachment_image_sizes( $tablet, 'full' ); ?>"><?php endif; ?>
                    <?php echo wp_get_attachment_image( $desktop, 'full', false, ['class'=>'hero__image']); ?>
                </picture>
            </div>
        <?php endif; ?>
        <div class="hero__overlay">
            <div class="container hero__container">
                <div class="hero__textContainer" data-aos="fade-up"><?php echo selectrum_get_hero_text(); ?></div>
            </div>
        </div>
    </div>
</div>