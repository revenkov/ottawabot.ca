<?php
function selectrum_get_hero_image_post_id() {
	global $post;

    if ( is_singular('team-member') ) {
        return selectrum_filter_id( 2596 );
    }
/*
    if ( is_singular('event') ) {
        return selectrum_filter_id( 2585 );
    }
*/
    if ( is_singular('news') ) {
        return selectrum_filter_id( 2599 );
    }

    if ( is_singular('newsletter') ) {
        return selectrum_filter_id( 2600 );
    }

	return $post->ID;
}

function selectrum_filter_id( $post_id = 0 ) {
	return apply_filters('wpml_object_id', $post_id);
}

function selectrum_get_permalink( $post_id ) {
	return get_the_permalink( selectrum_filter_id( $post_id ) );
}


function selectrum_get_image_url( $filename ) {
	return get_stylesheet_directory_uri().'/assets/images/'.$filename;
}

function selectrum_get_hero_title() {
	global $post;

	return get_the_title();
}

function selectrum_get_hero_text() {
	$text = '<h1 class="hero__title">'.selectrum_get_hero_title().'</h1>';

    if ( is_singular('team-member') ) {
        $title = get_field('title');
        if ( !empty( $title ) ) {
            $text .= '<p class="hero__text">'.$title.'</p>';
        }
    }

    if ( is_singular('event') ) {
        $date = get_field('date');
        if ( !empty( $date ) ) {
            $text .= '<p class="hero__text">'.$date.'</p>';
        }
    }

    if ( is_singular('news') ) {
        $category = get_field('category');
        if ( !empty( $category ) ) {
            $text .= '<p class="hero__text">'.$category->name.'</p>';
        }
    }

    if ( is_singular('newsletter') ) {
        $date = get_field('date');
        if ( !empty( $date ) ) {
            $text .= '<p class="hero__text">'.date_i18n('F d, Y', strtotime( $date )).'</p>';
        }
    }

	return $text;
}

function selectrum_truncate_string($str, $chars, $to_space, $replacement = "...") {
	if($chars > strlen($str)) return $str;

	$str = substr($str, 0, $chars);

	$space_pos = strrpos($str, " ");
	if($to_space && $space_pos >= 0) {
		$str = substr($str, 0, strrpos($str, " "));
	}

	return($str . $replacement);
}