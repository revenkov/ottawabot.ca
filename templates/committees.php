<?php
/**
 * Template Name: Committees
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content = get_field('content');
$committees = get_posts([
    'post_type' => 'committee',
    'posts_per_page' => '-1'
]);
?>
<div class="section">
    <div class="container container--narrow" data-aos="fade-up">
        <?php echo $content; ?>
    </div>

    <div class="container container--wide">
        <?php if ( !empty( $committees ) ) : ?>
        <div class="committees">
            <?php
            foreach ( $committees as $post ) :
                setup_postdata($post);
                $background_image = get_field('background_image');
                $color = get_field('color');
                $categories = get_field('categories');
                ?>
                <div class="committees__item" data-aos="fade-up">
                    <div class="committeeTeaser" style="--hover-color: #<?php echo $color; ?>;">
                        <div class="imageBlock imageBlock--formatted committeeTeaser__imageBlock"><?php echo wp_get_attachment_image( $background_image['ID'], 'full' ); ?></div>
                        <div class="committeeTeaser__content">
                            <h3><?php echo get_the_title(); ?></h3>
                        </div>
                        <button class="committeeTeaser__button" type="button" data-fancybox data-src="#<?php echo $post->post_name; ?>" title="Learn more"></button>
                        <div class="committeePopup" id="<?php echo $post->post_name; ?>" style="display: none;">
                            <h2><?php echo get_the_title(); ?></h2>
                            <div class="committeePopup__categories">
                                <?php foreach ( $categories as $category ) : ?>
                                    <div class="committeePopup__category">
                                        <h3 class="committeePopup__categoryName"><?php echo $category['category_title']; ?></h3>
                                        <div class="committeePopup__categoryMembers">
                                            <?php foreach ( $category['members'] as $member ) : ?>
                                                <div class="committeePopup__member">
                                                    <div class="committeePopup__memberImage"><?php echo wp_get_attachment_image( $member['photo']['ID'] ?? 3449, 'full' ); ?></div>
                                                    <div class="committeePopup__memberName text-md"><?php echo $member['full_name']; ?></div>
                                                    <div class="committeePopup__memberTitle"><?php echo $member['title']; ?></div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>


<?php get_footer(); ?>
