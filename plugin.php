<?php
/*
Plugin Name: 404 if not found
Plugin URI: https://github.com/YOURLS/404-if-not-found/
Description: Send a 404 (instead of a 302) when short URL is not found
Version: 1.2
Author: Lainbo
Author URI: https://yourls.org/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// 'keyword' provided ('abc' in 'http://sho.rt/abc') but not found
yourls_add_action('redirect_keyword_not_found', 'ozh_404_if_not_found', 999);

// 'keyword+' provided but this isnt an existing stat page
yourls_add_action('infos_keyword_not_found', 'ozh_404_if_not_found', 999);

// 'keyword' not provided: direct attempt at http://sho.rt/yourls-go.php or -infos.php
yourls_add_action('redirect_no_keyword', 'ozh_404_if_not_found', 999);
yourls_add_action('infos_no_keyword', 'ozh_404_if_not_found', 999);

// Display a default 404 not found page
function ozh_404_if_not_found() {
    yourls_status_header(404);
    $notfound = '<html lang="en"><head><meta charset="UTF-8"><meta name="viewport"content="width=device-width, initial-scale=1.0"><title>404 Page Not Found</title><style>body{background:radial-gradient(125%125%at 50%10%,#000 40%,#63e 100%);color:#FFF;margin:0;padding:0;height:100vh;width:100vw;display:flow-root}.container{text-align:center;width:fit-content;margin:16vh auto 0}h1{font-size:6rem;margin:0;color:#FFF}h2{font-size:2rem;margin-top:0;color:#EAEAEA}p{font-size:1.2rem;margin:10px 0;color:#A7A7A7;line-height:1.6}.content{border:2px solid#333;padding:20px 30px 40px;border-radius:24px}</style></head><body><body><div class="container"><div class="content"><h1>404</h1><h2>Oops! Page Not Found</h2><p>The page you&#39;re looking for might have been moved, deleted, or possibly never existed</p></div></div></body></body></html>';
    die($notfound);
}

/**
 * if you want to display a custom 404 page instead, replace the above function with
 * the following :
 * 
 * function ozh_404_if_not_found() {
 *     yourls_status_header(404);
 *     include_once('/full/path/to/your/404.html'); // full path to your error document
 *     die();
 * }
 * 
 */
