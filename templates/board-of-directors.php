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
$board_of_directors = get_field('board_of_directors');
if ( !empty( $board_of_directors ) ) :
?>
<div class="section">
    <div class="container container--wide">
        <div class="boardBlock">
            <?php foreach ( $board_of_directors as $item ) : ?>
                <div class="boardMemberTeaser">
                    <div class="boardMemberTeaser__imageContainer">
                        <?php echo wp_get_attachment_image( $item['photo']['ID'], 'full' ); ?>
                        <?php if ( !empty( $item['linkedin'] ) ) : ?>
                        <a href="<?php echo $item['linkedin']; ?>" class="boardMemberTeaser__button" title="Learn more"></a>
                        <?php endif; ?>
                    </div>
                    <div class="text-md boardMemberTeaser__name"><?php echo $item['full_name']; ?></div>
                    <div class="boardMemberTeaser__title"><?php echo $item['title']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>
