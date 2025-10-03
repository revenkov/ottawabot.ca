<?php
$category = get_field('category');
?>
<a class="newsTeaser" href="<?php the_permalink(); ?>">
    <h3 class="newsTeaser__title"><?php echo get_the_title(); ?></h3>
    <span class="newsTeaser__category"><?php echo $category->name; ?></span>
    <span class="newsTeaser__button"></span>
</a>
