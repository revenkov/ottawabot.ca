<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$photo = get_field('photo');
$bio = get_field('bio');
$linkedin = get_field('linkedin');
?>
<div class="section">
    <div class="container container--wide">
        <div class="teamMemberBlock">
            <div class="teamMemberBlock__col1" data-aos="fade-up">
                <div class="imageBlock imageBlock--square"><?php echo wp_get_attachment_image( $photo['ID'], 'full' ); ?></div>
            </div>
            <div class="teamMemberBlock__col2" data-aos="fade-up">
                <div class="teamMemberBlock__textContainer">
                    <?php echo $bio; ?>

                    <?php if ( !empty( $linkedin ) ): ?>
                    <p>
                        <a class="teamMemberBlock__linkedinLink" href="<?php echo $linkedin; ?>" target="_blank" rel="noopener" title="Follow me on the LinkedIn"></a>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
