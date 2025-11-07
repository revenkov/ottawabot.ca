<?php
/**
 * Template Name: Affinity programs
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
        <div class="textBlock" data-aos="fade-up"><?php echo $content; ?></div>
    </div>
</div>
<?php endif; ?>


<?php
$timeline = get_field('timeline');
if ( !empty( $timeline ) ) :
?>
<div class="section">
    <div class="container container--wide">
        <div class="timeline" data-aos="fade-up">
            <div class="timeline__nav">
                <ul class="timeline__navList">
                    <?php foreach ( $timeline as $key=>$item ) : ?>
                        <li class="timeline__navItem" style="--color: #<?php echo $item['color']; ?>">
                            <button class="timeline__navButton <?php echo $key === 0 ? 'active' : false; ?>" type="button" data-id="<?php echo sanitize_title($item['title']); ?>">
                                <span class="timeline__navIcon" style="--icon: url( <?php echo $item['icon']['url']; ?> );"></span>
                                <span class="timeline__navTitle"><?php echo $item['title']; ?></span>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="timeline__items">
                <?php foreach ( $timeline as $item ) : ?>
                    <div class="timeline__item" id="<?php echo sanitize_title($item['title']); ?>" style="--color: #<?php echo $item['color']; ?>">
                        <?php echo $item['content']; ?>

                        <div class="accordion">
                            <?php foreach ( $item['accordions'] as $accordion ) : ?>
                                <div class="accordion__header">
                                    <div class="accordion__title h4"><?php echo $accordion['title']; ?></div>
                                </div>
                                <div class="accordion__body">
                                    <div class="accordion__bodyInner">
                                        <div class="programs__itemHeader"><?php echo $accordion['header']; ?></div>

                                        <?php if ( !empty( $accordion['logos'] ) ) : ?>
                                            <div class="programs__itemLogos">
                                                <?php foreach ( $accordion['logos'] as $logo ) : ?>
                                                    <div class="programs__itemLogo">
                                                        <?php if ( !empty( $logo['url'] ) ) : ?><a href="<?php echo $logo['url']; ?>" target="_blank"><?php endif; ?>
                                                            <?php echo wp_get_attachment_image( $logo['logo']['ID'], 'full' ); ?>
                                                            <?php if ( !empty( $logo['url'] ) ) : ?></a><?php endif; ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo $accordion['content']; ?>

                                        <?php if ( !empty( $accordion['button'] ) ) : ?>
                                            <p>
                                                <a class="programs__itemLink" href="<?php echo $accordion['button']['url']; ?>" target="<?php echo $accordion['button']['target'] ?? '_self'; ?>"><span></span><?php echo $accordion['button']['title']; ?></a>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



<?php
/*
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
*/ ?>


<?php get_footer(); ?>
