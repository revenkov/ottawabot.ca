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
?>
<div class="section">
    <div class="container">
        <div class="homeAboutBlock">
            <div class="homeAboutBlock__col1">
                <div class="homeAboutBlock__textContainer">
                    <?php echo $content_group_1['content']; ?>
                    <?php get_template_part('parts/button', false, $content_group_1['button']); ?>
                </div>
            </div>
            <div class="homeAboutBlock__col2">
                <div class="homeAboutBlock__numbers">
                    <div class="homeAboutBlock__number">
                        <div class="number" data-to="<?php echo date('Y') - 1857; ?>">
                            <div class="number__counter"></div>
                            <div class="number__description text-sm"><?php echo $numbers_group['description_1']; ?></div>
                        </div>
                    </div>
                    <div class="homeAboutBlock__numbersDivider"></div>
                    <div class="homeAboutBlock__number">
                        <div class="number" data-to="<?php echo $numbers_group['number']; ?>">
                            <div class="number__counter"></div>
                            <div class="number__description text-sm"><?php echo $numbers_group['description_2']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$image_1 = get_field('image_1');
$content_group_2 = get_field('content_group_2');
get_template_part('parts/text_image', false, [
    'image' => $image_1,
    'content' => $content_group_2['content'],
    'button' => $content_group_2['button'],
    'image_position' => 1,
]);
?>


<?php
$icon_cards = get_field('icon_cards');
if ( !empty( $icon_cards ) ) :
?>
<div class="section">
    <div class="container container--wide">
        <div class="homeIconCards">
            <?php foreach ( $icon_cards as $item ) : ?>
                <div class="homeIconCards__card">
                    <div class="homeIconCards__cardIcon"><?php echo wp_get_attachment_image( $item['icon']['ID'] ); ?></div>
                    <div class="homeIconCards__cardText">
                        <div class="h4 homeIconCards__cardCategory text-sm"><?php echo $item['category']; ?></div>
                        <div class="homeIconCards__cardTitle"><?php echo $item['title']; ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>


<?php
$featured_events = get_field('featured_events');
if ( !empty( $featured_events ) ) :
?>
<div class="section">
    <div class="container">
        <div class="featuredEvents">
            <div class="featuredEvents__header">
                <h2>Featured events</h2>
            </div>
            <div class="featuredEvents__listing">
                <?php foreach ( $featured_events as $event ) : ?>
                    <div class="featuredEvents__item">
                        <div class="eventTeaser">
                            <div class="imageBlock imageBlock--formatted eventTeaser__imageBlock"><?php echo wp_get_attachment_image( $event['background_image']['ID'], 'full' ); ?></div>
                            <a class="eventTeaser__content" href="<?php echo $event['url']; ?>">
                                <span class="eventTeaser__date"><?php echo date_i18n('F d, Y', strtotime($event['date'])); ?></span>
                                <h3 class="eventTeaser__title"><?php echo $event['title']; ?></h3>
                                <span class="eventTeaser__button"></span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="featuredEvents__pagination">
                <a class="button" href="<?php echo selectrum_get_permalink( 2585 ); ?>">Browse all events</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php
$content_group_3 = get_field('content_group_3');
$query = new WP_Query([
    'post_type' => 'news',
    'posts_per_page' => 3,
    'ordfer' => 'DESC',
]);
if ( $query->have_posts() ) :
?>
<div class="section">
    <div class="container">
        <div class="latestNews">
            <div class="latestNews__items">
                <div class="latestNews__item">
                    <div class="latestNews__intro">
                        <?php echo $content_group_3['content']; ?>
                        <?php get_template_part('parts/button', false, $content_group_3['button']); ?>
                    </div>
                </div>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="latestNews__item">
                        <?php get_template_part('parts/news_teaser'); ?>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php
$image_2 = get_field('image_2');
$content_group_4 = get_field('content_group_4');
get_template_part('parts/text_image', false, [
    'image' => $image_2,
    'content' => $content_group_4['content'],
    'button' => $content_group_4['button'],
    'image_position' => 2,
]);
?>


<?php
$featured_testimonials = get_field('featured_testimonials');
if ( !empty( $featured_testimonials ) ) :
?>
<div class="section">
    <div class="container container--wide">
        <div class="testimonials">
            <h2 class="testimonials__title">TESTIMONIALS</h2>

            <div class="testimonialsSlider">
                <div class="testimonialsSlider__slides">
                    <?php
                    foreach ( $featured_testimonials as $post ) :
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
        </div>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>
