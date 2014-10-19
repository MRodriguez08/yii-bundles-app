<?php

/**
 * On-the-fly CSS Compression
 * Copyright (c) 2009 and onwards, Manas Tungare.
 * Creative Commons Attribution, Share-Alike.
 *
 * In order to minimize the number and size of HTTP requests for CSS content,
 * this script combines multiple CSS files into a single file and compresses
 * it on-the-fly.
 *
 * To use this in your HTML, link to it in the usual way:
 * <link rel="stylesheet" type="text/css" media="screen, print, projection" href="/css/compressed.css.php" />
 */
/* Add your CSS files to this array (THESE ARE ONLY EXAMPLES) */
$cssFiles = include(dirname(__FILE__) . "/protected/config/styles.php" );

/**
 * Ideally, you wouldn't need to change any code beyond this point.
 */
$buffer = "";
foreach ($cssFiles as $cssFile) {
    if (strcmp(substr($cssFile, 0, 2), "//") !== 0)
        $buffer .= file_get_contents($cssFile);
}

// Remove comments
$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);

// Remove space after colons
$buffer = str_replace(': ', ':', $buffer);

// Remove whitespace
$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);


file_put_contents("css/styles.min.css", $buffer);

$buffer = "";


$jsFiles = include(dirname(__FILE__) . "/protected/config/scripts.php" );

/**
 * Ideally, you wouldn't need to change any code beyond this point.
 */
$buffer = "";
foreach ($jsFiles as $jsFile) {
    if (strcmp(substr($jsFile, 0, 2), "//") !== 0){
        $str = file_get_contents($jsFile);
        $str = preg_replace("\/\/.*(\n)", "", $str);
        $buffer .= $str;
    }
        
}

// Remove comments
$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);

// Remove space after colons
$buffer = str_replace(': ', ':', $buffer);

// Remove whitespace
$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);


file_put_contents("assets/js/scripts.min.js", $buffer);
?>