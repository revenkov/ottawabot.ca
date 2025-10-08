<?php
/**
 * Template Name: News
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
        <div class="textBlock"><?php echo $content; ?></div>
    </div>
</div>
<?php endif; ?>


<?php
$news = get_posts([
    'post_type' => 'news',
    'posts_per_page' => -1,
]);
?>
<div class="section">
    <div class="container">
        <div class="newsListing">
            <?php if ( !empty( $news ) ) : ?>
                <div class="newsListing__items">
                    <?php
                    foreach ( $news as $post ) :
                        setup_postdata($post);
                        ?>
                        <div class="newsListing__item">
                            <?php get_template_part('parts/news_teaser2'); ?>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
                <div class="newsListing__pagination">
                    <div class="loader"><span></span><span></span><span></span><span></span></div>
                </div>
            <?php else : ?>
                <div class="newsListing__nothingFound">Nothing found</div>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
