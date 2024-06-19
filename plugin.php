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
    $notfound = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport"content="width=device-width, initial-scale=1.0"><title>404 Not Found</title><style>*,*::before,*::after{margin:0;padding:0}body{color:#888;height:100vh;height:calc(var(--1dvh,1vh)*100);height:100dvh}@media(prefers-color-scheme:dark){html{color-scheme:dark}}main{display:grid;place-items:center;height:100%}h1{font-size:50px;display:inline-block;padding-right:12px;animation:type.5s alternate infinite}@keyframes type{from{box-shadow:inset-3px 0px 0px#888}to{box-shadow:inset-3px 0px 0px transparent}}</style></head><body><main><h1>404 Not Found</h1></main></body></html>';
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
