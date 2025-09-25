<?php
/**
 * Template Name: Team
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
    <div class="container">
        <div class="teamBlock">
            <?php
            foreach ( $posts as $post ) :
                setup_postdata( $post );
                $photo = get_field('photo');
                $title = get_field('title');
                $email = get_field('email');
                $phone = get_field('phone');
                $ext = get_field('ext');
                ?>
                <div class="teamMemberTeaser">
                    <div class="teamMemberTeaser__imageContainer">
                        <?php echo wp_get_attachment_image( $photo['ID'], 'full' ); ?>
                        <a href="<?php echo get_the_permalink(); ?>" class="teamMemberTeaser__button" title="Learn more"></a>
                    </div>
                    <h3 class="h4 teamMemberTeaser__name"><?php echo get_the_title(); ?></h3>
                    <div class="teamMemberTeaser__title"><?php echo $title; ?></div>
                    <div class="teamMemberTeaser__email"><p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p></div>
                    <div class="teamMemberTeaser__phone"><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>, <?php echo $ext; ?></div>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>
