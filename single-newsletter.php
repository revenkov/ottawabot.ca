<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$sections = get_field('sections');
if ( !empty( $sections ) ) :
    echo '<div class="section">';
    foreach ($sections as $key => $item) :
        echo '<div class="container container--narrow">';
        switch ($item['acf_fc_layout']) {
            case 'text_full_width':
                ?>
                <div class="textBlock" data-aos="fade-up"><?php echo $item['content'] ?></div>
                <?php
                break;
            case 'image_full_width':
                ?>
                <div class="imageBlock" data-aos="fade-up"><?php echo wp_get_attachment_image( $item['image']['ID'], 'full' ); ?></div>
                <?php
                break;
        }
        echo '</div>';
    endforeach;
    echo '</div>';
endif;
?>


<?php get_footer(); ?>
