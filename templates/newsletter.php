<?php
/**
 * Template Name: Newsletter
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content = get_field('content_1');
if ( !empty( $content ) ) :
?>
<div class="section">
    <div class="container container--narrow">
        <div class="textBlock" data-aos="fade-up"><?php echo $content; ?></div>
    </div>
</div>
<?php endif; ?>


<?php
$news = get_posts([
    'post_type' => 'newsletter',
    'posts_per_page' => -1,
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'meta_key' => 'date',
]);
?>
<div class="section">
    <div class="container container--wide">
        <div class="newsletterListing" data-aos="fade-up">
            <?php if ( !empty( $news ) ) : ?>
                <div class="newsletterListing__items">
                    <?php
                    foreach ( $news as $post ) :
                        setup_postdata($post);
                        ?>
                        <div class="newsletterListing__item">
                            <?php get_template_part('parts/newsletter_teaser'); ?>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
                <div class="newsletterListing__pagination">
                    <div class="loader"><span></span><span></span><span></span><span></span></div>
                </div>
            <?php else : ?>
                <div class="newsletterListing__nothingFound">Nothing found</div>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
