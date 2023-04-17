<?php
// Getting compiled script and styles from Webpack build folder
$assetManifest = json_decode(file_get_contents(__DIR__ . '/build/asset-manifest.json'), true);
$frameworkStylesFile = $assetManifest['files']['main.css'];
$frameworkScriptsFile = $assetManifest['files']['main.js'];

// Passing to JS WordPress env variables
$wpOptions = wp_load_alloptions();
foreach (['admin_email', 'mailserver_url', 'mailserver_login', 'mailserver_pass', 'rewrite_rules', 'wp_user_roles', 'cron'] as $option) {
    unset($wpOptions[$option]);
}
$routes = [];
foreach (get_pages() as $page) {
    $routes['pages'][] = $page->post_name;
}
foreach (get_posts() as $post) {
    $routes['posts'][] = $post->post_name;
}
$wpVariables = [
    'routes' => $routes,
    'options' => $wpOptions,
    'template_directory_uri' => get_template_directory_uri(),
];

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="<?= $wpOptions['blog_charset'] ?>">
    <base href="<?= $wpVariables['template_directory_uri'] ?>/build/">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <script>
        window.wpVariables = <?= json_encode($wpVariables) ?>;
        console.log(window.wpVariables);
    </script>
    <link href="<?= $frameworkStylesFile ?>" rel="stylesheet">
    <script defer="defer" src="<?= $frameworkScriptsFile ?>"></script>
</head>
<body>
<div id="root"></div>
<?php wp_footer() ?>
</html>
