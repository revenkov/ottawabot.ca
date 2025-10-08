<?php
$event = $args['event'];
?>
<div class="eventTeaser">
    <div class="imageBlock imageBlock--formatted eventTeaser__imageBlock"><?php echo wp_get_attachment_image( $event['background_image']['ID'], 'full', false, ['class'=>'eventTeaser__image'] ); ?></div>
    <a class="eventTeaser__content" href="<?php echo $event['url']; ?>">
        <span class="eventTeaser__date"><?php echo date_i18n('F d, Y', strtotime($event['date'])); ?></span>
        <h3 class="eventTeaser__title"><?php echo $event['title']; ?></h3>
        <span class="eventTeaser__button"></span>
    </a>
</div>
