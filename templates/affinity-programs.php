<?php
/**
 * Template Name: Affinity programs
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content = get_field('content');
$programs = get_field('programs');
?>
<div class="section">
    <div class="container container--narrow">
        <?php echo $content; ?>

        <?php if ( !empty( $programs ) ) : ?>
        <div class="programs">
            <?php foreach ( $programs as $item ) : ?>
                <div class="programs__item" data-aos="fade-up">
                    <div class="programs__itemHeader"><?php echo $item['header']; ?></div>
                    <?php if ( !empty( $item['logos'] ) ) : ?>
                    <div class="programs__itemLogos">
                        <?php foreach ( $item['logos'] as $logo ) : ?>
                            <div class="programs__itemLogo">
                                <?php if ( !empty( $logo['url'] ) ) : ?><a href="<?php echo $logo['url']; ?>" target="_blank"><?php endif; ?>
                                    <?php echo wp_get_attachment_image( $logo['logo']['ID'], 'full' ); ?>
                                <?php if ( !empty( $logo['url'] ) ) : ?></a><?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <div class="programs__itemContent">
                        <?php echo $item['content']; ?>

                        <?php if ( !empty( $item['button'] ) ) : ?>
                            <p>
                                <a class="programs__itemLink" href="<?php echo $item['button']['url']; ?>" target="<?php echo $item['button']['target'] ?? '_self'; ?>"><span></span><?php echo $item['button']['title']; ?></a>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>


<?php get_footer(); ?>
