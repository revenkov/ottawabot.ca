<?php
/**
 * Template Name: Gallery
 */
use Samwilson\PhpFlickr\PhpFlickr;
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
$flickr = new PhpFlickr(FLICKR_API_KEY, FLICKR_API_SECRET);
$cache = new Symfony\Component\Cache\Adapter\FilesystemAdapter('PhpFlickr', 0, wp_get_upload_dir()['basedir'] . '/cache/');
$flickr->setCache($cache);
$flickr->setCacheDefaultExpiry( 60 * 60 * 24 * 30 );
$lists = $flickr->photosets()->getList('78514975@N07', $_REQUEST['pagination'] ?? 1, 6);
?>
<div class="section">
    <div class="container">
        <div class="galleryListing" data-aos="fade-up">
            <?php if ( !empty( $lists['photoset'] ) ) : ?>
                <div class="galleryListing__items">
                    <?php
                    foreach ( $lists['photoset'] as $photoset_key=>$photoset ) :
                        $photoset = $flickr->photosets()->getPhotos( $photoset['id'], $photoset['owner'], null, 1, 1 );
                        //print_r($flickr->photosets()->getInfo( $photoset['id'], $photoset['owner'] ));
                        $photos = [];
                        foreach ( $photoset['photo'] as $photo_key=>$photo ) :
                            $photoSizes = $flickr->photos()->getSizes( $photo['id'] );
                            //print_r( $photoSizes );
                            foreach ( $photoSizes['size'] as $size ) :
                                $photo_srcset = [];
                                switch( $size['label'] ) :
                                    case 'Square':
                                    case 'Large Square':
                                        break;
                                    case 'Original':
                                        $photos[$photo_key]['width'] = $size['width'];
                                        $photos[$photo_key]['height'] = $size['height'];
                                        $photos[$photo_key]['src'] = $size['source'];
                                        $photos[$photo_key]['alt'] = $photo['title'];
                                    default:
                                        $photos[$photo_key]['srcset'][] = $size['source'] . ' ' . $size['width'] . 'w';
                                        $photos[$photo_key]['sizes'][] = '(width <= '.$size['width'].'px) '. $size['width'] .'px';
                                endswitch;
                            endforeach;
                        endforeach;
                        ?>
                        <div class="galleryListing__item">
                            <div class="galleryTeaser">
                                <div class="imageBlock imageBlock--formatted imageBlock--landscape galleryTeaser__imageBlock">
                                    <img
                                        class="imageBlock__image"
                                        src="<?php echo $photos[0]['src']; ?>"
                                        width="<?php echo $photos[0]['width']; ?>"
                                        height="<?php echo $photos[0]['height']; ?>"
                                        alt="<?php //echo $photos[0]['title']; ?>"
                                        srcset="<?php echo implode(', ', $photos[0]['srcset']); ?>"
                                        sizes="<?php echo implode(', ', $photos[0]['sizes']); ?>"
                                    >
                                </div>
                                <a class="galleryTeaser__content" href="https://www.flickr.com/photos/ottawa_board_of_trade/albums/<?php echo $photoset['id']; ?>" target="_blank">
                                    <h3 class="galleryTeaser__title"><?php echo $photoset['title']; ?></h3>
                                    <span class="galleryTeaser__button"></span>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="galleryListing__pagination" data-aos="fade-up">
                    <div class="loader"><span></span><span></span><span></span><span></span></div>
                </div>
            <?php else : ?>
                <div class="galleryListing__nothingFound" data-aos="fade-up">Nothing found</div>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
