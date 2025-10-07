<?php
/**
 * Template Name: Board of directors
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content = get_field('content');
if ( !empty( $content ) ) :
?>
<div class="section">
    <div class="container container--narrow">
        <div class="textBlock"><?php echo $content; ?></div>
    </div>
</div>
<?php endif; ?>


<?php
$posts = get_posts([
    'post_type' => 'team-member',
    'posts_per_page' => -1,
]);
if ( !empty( $posts ) ) :
?>
<div class="section">
    <div class="container container--wide">
        <div class="boardBlock">
            <?php
            foreach ( $posts as $post ) :
                setup_postdata( $post );
                $photo = get_field('photo');
                $title = get_field('title');
                $email = get_field('email');
                $phone = get_field('phone');
                $ext = get_field('ext');
                ?>
                <div class="boardMemberTeaser">
                    <div class="boardMemberTeaser__imageContainer">
                        <?php echo wp_get_attachment_image( $photo['ID'], 'full' ); ?>
                        <a href="<?php echo get_the_permalink(); ?>" class="boardMemberTeaser__button" title="Learn more"></a>
                    </div>
                    <h3 class="h4 boardMemberTeaser__name"><?php echo get_the_title(); ?></h3>
                    <div class="boardMemberTeaser__title"><?php echo $title; ?></div>
                    <div class="boardMemberTeaser__email"><p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p></div>
                    <div class="boardMemberTeaser__phone"><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>, <?php echo $ext; ?></div>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>
