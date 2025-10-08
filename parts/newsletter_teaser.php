<?php
$date = get_field('date');
?>
<a class="newsletterTeaser" href="<?php the_permalink(); ?>">
    <h3 class="newsletterTeaser__title"><?php echo get_the_title(); ?></h3>
    <span class="newsletterTeaser__date"><?php echo date_i18n('F d, Y', strtotime( $date )); ?></span>
    <span class="newsletterTeaser__button"></span>
</a>
