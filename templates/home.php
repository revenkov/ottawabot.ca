<?php
/**
 * Template Name: Home
 */
?>


<?php get_header(); ?>


<?php
$hero_images = get_field('hero_images', selectrum_get_hero_image_post_id());
$desktop = $hero_images['desktop']['ID'] ?? 3058;
$tablet = $hero_images['tablet']['ID'] ?? 3056;
$mobile = $hero_images['mobile']['ID'] ?? 3057;
$video_mp4 = get_field('video_mp4');
$video_webm = get_field('video_webm');
$title = get_field('title');
$subtitle = get_field('subtitle');
$button_1 = get_field('button_1');
$button_2 = get_field('button_2');
$button_3 = get_field('button_3');
?>
<div class="container">
    <div class="homeHero">
        <?php if ( !empty( $video_mp4 ) || !empty( $video_webm ) ) : ?>
            <video class="homeHero__video" width="<?php echo $video_mp4['width'] ?? 'auto'; ?>" height="<?php echo $video_mp4['height'] ?? 'auto'; ?>" autoplay muted loop playsinline>
                <source src="<?php echo $video_mp4['url']; ?>" type="video/mp4">
                <source src="<?php echo $video_webm['url']; ?>" type="video/webm">
            </video>
        <?php else : ?>
            <picture>
                <?php if ( !empty( $mobile ) ) : ?><source media="(max-width: 639px)" srcset="<?php echo wp_get_attachment_image_srcset( $mobile, 'full' ); ?>" sizes="<?php echo wp_get_attachment_image_sizes( $mobile, 'full' ); ?>"><?php endif; ?>
                <?php if ( !empty( $tablet ) ) : ?><source media="(max-width: 1259px)" srcset="<?php echo wp_get_attachment_image_srcset( $tablet, 'full' ); ?>" sizes="<?php echo wp_get_attachment_image_sizes( $tablet, 'full' ); ?>"><?php endif; ?>
                <?php echo wp_get_attachment_image( $desktop, 'full', false, ['class'=>'homeHero__image']); ?>
            </picture>
        <?php endif; ?>
        <div class="homeHero__overlay">
            <div class="homeHero__text">
                <h1><?php echo $title; ?></h1>
                <div class="h4 homeHero__subtitle"><?php echo $subtitle; ?></div>
            </div>
            <div class="homeHero__buttons">
                <?php if ( !empty( $button_1 ) ) : ?>
                    <a href="<?php echo $button_1['url']; ?>" class="homeHero__button">
                        <span class="homeHero__buttonText"><?php echo $button_1['title']; ?></span>
                        <span class="homeHero__buttonArrow"></span>
                    </a>
                <?php endif; ?>
                <?php if ( !empty( $button_2 ) ) : ?>
                    <a href="<?php echo $button_2['url']; ?>" class="homeHero__button">
                        <span class="homeHero__buttonText"><?php echo $button_2['title']; ?></span>
                        <span class="homeHero__buttonArrow"></span>
                    </a>
                <?php endif; ?>
                <?php if ( !empty( $button_3 ) ) : ?>
                    <a href="<?php echo $button_3['url']; ?>" class="homeHero__button">
                        <span class="homeHero__buttonText"><?php echo $button_3['title']; ?></span>
                        <span class="homeHero__buttonArrow"></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php
$content_group_1 = get_field('content_group_1');
$numbers_group = get_field('numbers_group');
$image_1 = get_field('image_1');
$content_group_2 = get_field('content_group_2');
$icon_cards = get_field('icon_cards');
$featured_events = get_field('featured_events');
$content_group_3 = get_field('content_group_3');
$content_group_4 = get_field('content_group_4');
$image_2 = get_field('image_2');
$featured_testimonials = get_field('featured_testimonials');
?>


<?php get_footer(); ?>
