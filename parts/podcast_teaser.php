<?php
$thumbnail = get_field('thumbnail');
$episode_number = get_field('episode_number');
$description = get_field('description');
$apple = get_field('apple');
$spotify = get_field('spotify');
$watch_online = get_field('watch_online');
?>
<div class="podcastTeaser">
    <div class="podcastTeaser__imageCol">
        <div class="imageBlock podcastTeaser__imageBlock"><?php echo wp_get_attachment_image( $thumbnail['ID'], 'full', false, ['class'=>'podcastTeaser__image'] ); ?></div>
    </div>
    <div class="podcastTeaser__textCol">
        <div class="podcastTeaser__content">
            <p class="podcastTeaser__episode">Episode <?php echo $episode_number; ?></p>
            <div>
                <h3 class="h4 podcastTeaser__title"><?php echo get_the_title(); ?></h3>
                <p class="podcastTeaser__description"><?php echo $description; ?></p>
            </div>
        </div>
        <p class="podcastTeaser__buttons">
            <?php if ( !empty( $apple ) ) : ?><a class="button" href="<?php echo $apple; ?>" target="_blank">Listen on Apple</a><?php endif; ?>
            <?php if ( !empty( $spotify ) ) : ?><a class="button" href="<?php echo $spotify; ?>" target="_blank">Listen on Spotify</a><?php endif; ?>
            <?php if ( !empty( $watch_online ) ) : ?><a class="button" href="<?php echo $watch_online; ?>" target="_blank">Watch Online</a><?php endif; ?>
        </p>
    </div>
</div>
