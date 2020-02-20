<?php
$timeout = 3600; // One Hour
$file = '/tmp/cache/' . md5($_SERVER['REQUEST_URI']);

if (file_exists($file) && (filemtime($file) + $timeout) > time()) {
    // Output the existing file to the user
    readfile($file);
    exit();
} else {
    // Setup saving and let the page execute:
    ob_start();
    register_shutdown_function(function () use ($file) {
        $content = ob_get_flush();
        file_put_contents($file, $content);
    });
}
?>