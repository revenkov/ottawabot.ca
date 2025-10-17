<?php
/**
 * Template Name: Events
 */
?>


<?php get_header(); ?>


<?php get_template_part('parts/hero'); ?>


<?php
$content_1 = get_field('content_1');
if ( !empty( $content_1 ) ) :
?>
<div class="section">
    <div class="container container--narrow" data-aos="fade-up">
        <?php echo $content_1; ?>
    </div>
</div>
<?php endif; ?>


<?php
$purple_card = get_field('purple_card');
$green_card = get_field('green_card');
$blue_card = get_field('blue_card');
?>
<div class="section">
    <div class="container">
        <h2 style="text-align: center;" data-aos="fade-up">BENEFITS OF ATTENDING</h2>

        <div class="benefits">
            <div class="benefits__card" data-aos="fade-up">
                <div class="benefits__cardImageBlock">
                    <?php echo wp_get_attachment_image( $purple_card['background_image']['ID'], 'full' ); ?>
                </div>
                <div class="benefits__cardContentBlock">
                    <?php echo wp_get_attachment_image( $purple_card['icon']['ID'], 'full', false, ['class'=>'benefits__cardIcon'] ); ?>
                    <h3 class="benefits__cardTitle"><?php echo $purple_card['title']; ?></h3>
                    <p class="benefits__cardText"><?php echo $purple_card['content']; ?></p>
                </div>
            </div>
            <div class="benefits__card" data-aos="fade-up">
                <div class="benefits__cardImageBlock">
                    <?php echo wp_get_attachment_image( $green_card['background_image']['ID'], 'full' ); ?>
                </div>
                <div class="benefits__cardContentBlock">
                    <?php echo wp_get_attachment_image( $green_card['icon']['ID'], 'full', false, ['class'=>'benefits__cardIcon']  ); ?>
                    <h3 class="benefits__cardTitle"><?php echo $green_card['title']; ?></h3>
                    <p class="benefits__cardText"><?php echo $green_card['content']; ?></p>
                </div>
            </div>
            <div class="benefits__card" data-aos="fade-up">
                <div class="benefits__cardImageBlock">
                    <?php echo wp_get_attachment_image( $blue_card['background_image']['ID'], 'full' ); ?>
                </div>
                <div class="benefits__cardContentBlock">
                    <?php echo wp_get_attachment_image( $blue_card['icon']['ID'], 'full', false, ['class'=>'benefits__cardIcon']  ); ?>
                    <h3 class="benefits__cardTitle"><?php echo $blue_card['title']; ?></h3>
                    <p class="benefits__cardText"><?php echo $blue_card['content']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$content_2 = get_field('content_2');
$events_1 = get_field('events_1');
if ( !empty( $events_1 ) ) :
?>
<div class="section">
    <div class="container container--middle" data-aos="fade-up">
        <?php echo $content_2; ?>

        <?php get_template_part('parts/events_slider', false, ['events' => $events_1]); ?>
    </div>
</div>
<?php endif; ?>


<?php
$content_3 = get_field('content_3');
$events_2 = get_field('events_2');
if ( !empty( $events_2 ) ) :
?>
<div class="section">
    <div class="container container--middle" data-aos="fade-up">
        <?php echo $content_3; ?>

        <?php get_template_part('parts/events_slider', false, ['events' => $events_2]); ?>
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
                            <div class="eventSlide__textCol">
                                <h3 class="eventSlide__title"><?php echo get_the_title(); ?></h3>
                                <div class="eventSlide__date"><?php echo $date; ?></div>
                                <p><?php echo $excerpt; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<div class="section">
    <div class="container container--middle" data-aos="fade-up">
        <div id="mni-calendar-1760625345654" style="overflow: hidden;"></div>
        <script type="text/javascript" src="https://business.ottawabot.ca/Content/Script/Calendar.min.js"></script>
        <script type="text/javascript">
            /*<![CDATA[*/
            new MNI.Widgets.Calendar("mni-calendar-1760625345654",{"showLinks":true,"popUp":false,"headerFormat":"MMMM yyyy","weekdayFormat":"ddd","styleTemplate":"#@id .mn-widget-calendar{color:#2B2B2B;font-family:\"Montserrat\",sans-serif;font-size:18px;float:left;line-height:150%;text-align:center;width:100%}#@id .mn-widget-calendar a{color:#1D8BCD;font-weight:700;text-decoration:none}#@id .mn-widget-calendar a:hover{color:#78BE21}#@id .mn-widget-calendar-clear{clear:both}#@id .mn-widget-calendar-header{font-weight:700;text-align:center;text-transform:uppercase}#@id .mn-widget-calendar-prev{float:left}#@id .mn-widget-calendar-next{float:right}#@id .mn-widget-calendar-weekday,.mn-widget-calendar-day{display:inline-block;width:14.285714285714286%}#@id .mn-widget-calendar-day-prev,.mn-widget-calendar-day-next{color:#5e5e5e}"}).create();
            /*]]>*/
        </script>
    </div>
</div>


<?php
$testimonials = get_field('featured_testimonials');
if ( !empty( $testimonials ) ) :
?>
<div class="section">
    <div class="container container--wide">
        <div class="testimonials" data-aos="fade-up">
            <h2 class="testimonials__title">TESTIMONIALS</h2>

            <?php get_template_part('parts/testimonials', false, ['testimonials' => $testimonials]); ?>
        </div>
    </div>
</div>
<?php endif; ?>


<?php get_footer(); ?>