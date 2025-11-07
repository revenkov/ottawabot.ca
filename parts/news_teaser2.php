<?php
$thumbnail_image = get_field('thumbnail_image');
$category = get_field('category');
if ( empty( $thumbnail_image ) ) {
    $thumbnail_image = get_field('image', 'term_'.$category->term_id);
    $no_overlay = true;
}
?>
<div class="newsTeaser2">
    <div class="imageBlock imageBlock--formatted newsTeaser2__imageBlock"><?php echo wp_get_attachment_image( $thumbnail_image['ID'], 'full', false, ['class'=>'newsTeaser2__image'] ); ?></div>
    <a class="newsTeaser2__content <?php if ( !empty($no_overlay) ) : ?>noOverlay<?php endif; ?>" href="<?php echo get_the_permalink(); ?>">
        <span class="newsTeaser2__date"><?php echo $category->name; ?></span>
        <h3 class="newsTeaser2__title"><?php echo selectrum_truncate_string(get_the_title(), 80, true); ?></h3>
        <span class="newsTeaser2__button"></span>
    </a>
</div>
