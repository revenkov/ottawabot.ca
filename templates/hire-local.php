<?php
/**
 * Template Name: Hire local
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$image_1 = get_field('image_1');
$content_group_1 = get_field('content_group_1');
?>
<div class="section">
    <div class="container">
        <div class="textImageBlock textImageBlock--1">
            <div class="textImageBlock__cols">
                <div class="textImageBlock__textCol" data-aos="fade-up">
                    <div class="textImageBlock__textWrapper">
                        <div class="textImageBlock__textInner">
                            <div class="textImageBlock__textInner2">
                                <div class="number" data-to="<?php echo $content_group_1['number']; ?>">
                                    <div class="number__counter"></div>
                                    <div class="number__description text-sm"><?php echo $content_group_1['description_1']; ?></div>
                                </div>

                                <?php echo $content_group_1['content']; ?>

                                <div class="textImageBlock__text2" data-aos="fade-up">
                                    <?php echo $content_group_1['content_2']; ?>

                                    <?php get_template_part('parts/button', false, $content_group_1['button']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="textImageBlock__imageCol" data-aos="fade-up">
                    <?php if ( !empty($image_1) ) : ?>
                        <div class="imageBlock imageBlock--formatted"><?php echo wp_get_attachment_image( $image_1['ID'], 'full' ); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$content_group_2 = get_field('content_group_2');
$icon_cards = get_field('icon_cards');
?>
<div class="section">
    <div class="container container--wide" data-aos="fade-up">
        <?php echo $content_group_2['content']; ?>

        <?php if ( !empty( $icon_cards ) ) : ?>
        <div class="iconsList">
            <?php foreach ( $icon_cards as $item ) : ?>
                <div class="iconsList__item">
                    <div class="iconsList__itemIcon"><?php echo wp_get_attachment_image( $item['icon']['ID'] ); ?></div>
                    <div class="h4 iconsList__itemTitle"><?php echo $item['title']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>


<?php
$content_group_3 = get_field('content_group_3');
if ( !empty( $content_group_3 ) ) :
?>
<div class="section">
    <div class="container container--narrow" data-aos="fade-up">
        <?php echo $content_group_3['content']; ?>
    </div>
</div>
<?php endif; ?>


<?php
$content_group_4 = get_field('content_group_4');
$map = get_field('map');
if ( !empty( $content_group_3 ) ) :
?>
<div class="section">
    <div class="container">
        <div class="mapBlock">
            <div class="mapBlock__mapCol" data-aos="fade-up">
                <?php if ( !empty($map['desktop']) ) : ?>
                    <div class="imageBlock">
                        <picture>
                            <?php if ( !empty( $map['mobile'] ) ) : ?><source media="(max-width: 639px)" srcset="<?php echo wp_get_attachment_image_srcset( $map['mobile']['ID'], 'full' ); ?>" sizes="<?php echo wp_get_attachment_image_sizes( $map['mobile']['ID'], 'full' ); ?>"><?php endif; ?>
                            <?php if ( !empty( $map['tablet'] ) ) : ?><source media="(max-width: 1119px)" srcset="<?php echo wp_get_attachment_image_srcset( $map['tablet']['ID'], 'full' ); ?>" sizes="<?php echo wp_get_attachment_image_sizes( $map['tablet']['ID'], 'full' ); ?>"><?php endif; ?>
                            <?php echo wp_get_attachment_image( $map['desktop']['ID'], 'full'); ?>
                        </picture>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mapBlock__textCol" data-aos="fade-up">
                <div class="mapBlock__textContainer">
                    <?php echo $content_group_4['content']; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php
$carousel = get_field('carousel');
if ( !empty( $carousel ) ) :
?>
<div class="section">
    <div class="container">
        <div class="logoTextSlider" data-aos="fade-up">
            <div class="logoTextSlider__slides">
                <?php foreach ( $carousel as $item ) : ?>
                    <div class="logoTextSlider__slide">
                        <div class="logoTextSlide">
                            <div class="logoTextSlide__logoCol"><?php echo wp_get_attachment_image( $item['logo']['ID'], 'full' ); ?></div>
                            <div class="logoTextSlide__textCol"><?php echo $item['content']; ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php
$logos = get_field('logos');
if ( !empty( $logos ) ) :
?>
<div class="section">
    <div class="container container--middle">
        <h2 style="text-align: center" data-aos="fade-up">Our Key Leading Partners</h2>

        <div class="logos2">
            <?php foreach ( $logos as $item ) : ?>
                <div class="logos2__item" data-aos="fade-up">
                    <?php if ( !empty( $item['url'] ) ) : ?><a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank"><?php endif; ?>
                        <?php echo wp_get_attachment_image( $item['logo']['ID'], 'full' ); ?>
                    <?php if ( !empty( $item['url'] ) ) : ?></a><?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>