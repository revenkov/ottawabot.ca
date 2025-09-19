<?php
$content_builder = get_field('content_builder');
if ( !empty( $content_builder ) ) :
    ///echo '<div class="contentBuilder">';
    foreach ($content_builder as $key => $item) :
        get_template_part('parts/' . $item['acf_fc_layout'], null, $item);
    endforeach;
    //echo '</div>';
endif;