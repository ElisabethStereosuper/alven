<?php get_header(); ?>

<div class='title-wrapper'>
    <div class='container'>
        <h1><?php _e('404 - Page not found', 'alven'); ?></h1>
    </div>
</div>

<div class='container align-center'>
    
    <img src='<?php echo get_template_directory_uri(); ?>/img/zebra.jpg' alt=''>
    <p><?php _e('Oops, this page was deleted or never existed.', 'alven'); ?></p>
    <p><a href="./" class='btn'><?php _e('Go back home', 'alven'); ?></a></p>

</div>

<?php get_footer(); ?>