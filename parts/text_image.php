<?php
$header = $args['header'] ?? '';
$image = $args['image'] ?? false;
$content_1 = $args['content_1'] ?? '';
$content_2 = $args['content_2'] ?? '';
$video_url = $args['video_url'] ?? '';
?>
<div class="section">
    <div class="textImageBlock">
        <?php if ( !empty( $header ) ) : ?>
            <div class="textImageBlock__header" data-aos="fade-up">
                <div class="container container--middle">
                    <div class="textImageBlock__headerInner">
                        <?php echo $header; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="textImageBlock__cols">
            <div class="textImageBlock__imageCol" data-aos="fade-up">
                <div class="imageBlock imageBlock--parallax <?php echo !empty( $video_url ) ? 'imageBlock--video imageBlock--videoLeft' : ''; ?>">
                    <?php if ( !empty( $video_url ) ) : ?><a href="javascript:" data-fancybox data-src="<?php echo $video_url; ?>"><?php endif; ?>
                        <?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
                    <?php if ( !empty( $video_url ) ) : ?></a><?php endif; ?>
                </div>
            </div>
            <div class="textImageBlock__textCol" data-aos="fade-up">
                <div class="textImageBlock__textWrapper">
                    <div class="textImageBlock__textInner">
                        <div class="textImageBlock__textInner2">
                            <div class="container">
                                <?php echo $content_1; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ( !empty( $content_2 ) ) : ?>
                <div class="textImageBlock__textCol textImageBlock__textCol--2" data-aos="fade-up">
                    <div class="textImageBlock__textWrapper">
                        <div class="textImageBlock__textInner">
                            <div class="textImageBlock__textInner2">
                                <div class="container">
                                    <?php echo $content_2; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>