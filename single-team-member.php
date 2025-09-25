<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$photo = get_field('photo');
$bio = get_field('bio');
?>
<div class="section">
    <div class="container">
        <div class="teamMemberBlock">
            <div class="teamMemberBlock__col1">
                <div class="imageBlock imageBlock--square"><?php echo wp_get_attachment_image( $photo['ID'], 'full' ); ?></div>
            </div>
            <div class="teamMemberBlock__col2">
                <?php echo $bio; ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
