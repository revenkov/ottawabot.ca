<?php
/**
 * Template Name: Podcast
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content = get_field('content_1');
if ( !empty( $content ) ) :
?>
<div class="section">
    <div class="container container--narrow" data-aos="fade-up">
        <?php echo $content; ?>
    </div>
</div>
<?php endif; ?>


<?php
$episodes = get_posts([
    'post_type' => 'podcast-episode',
    'posts_per_page' => -1,
]);
?>
<div class="section">
    <div class="container container--wide">
        <div class="podcastListing" data-aos="fade-up">
            <?php if ( !empty( $episodes ) ) : ?>
                <div class="podcastListing__items">
                    <?php
                    foreach ( $episodes as $post ) :
                        setup_postdata($post);
                        ?>
                        <div class="podcastListing__item">
                            <?php get_template_part('parts/podcast_teaser'); ?>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
                <div class="podcastListing__pagination">
                    <div class="loader"><span></span><span></span><span></span><span></span></div>
                </div>
            <?php else : ?>
                <div class="podcastListing__nothingFound">Nothing found</div>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
