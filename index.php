<?php
$assetManifest = json_decode(file_get_contents(__DIR__ . '/build/asset-manifest.json'), true);
$stylesFile = $assetManifest['files']['main.css'];
$scriptsFile = $assetManifest['files']['main.js'];

register_nav_menus(
    array(
        'primary' => 'Primary menu',
    )
);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <base href="<?php echo get_template_directory_uri() ?>/build/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <script defer="defer" src="<?php echo $scriptsFile ?>"></script>
    <link href="<?php echo $stylesFile ?>" rel="stylesheet">
</head>
<body>

<div id="root"></div>

<?php wp_footer(); ?>
</html>
