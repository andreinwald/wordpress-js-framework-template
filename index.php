<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <base href="<?php echo get_template_directory_uri() ?>/build/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <script defer="defer" src="<?php echo get_template_directory_uri() ?>/build/static/js/main.68afa4bf.js"></script>
    <link href="<?php echo get_template_directory_uri() ?>/build/static/css/main.073c9b0a.css" rel="stylesheet">
</head>
<body>

<noscript>You need to enable JavaScript to run this app.</noscript>
<div id="root"></div>

<?php wp_footer(); ?>
</html>
