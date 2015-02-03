<?php

/*
  Plugin Name: WP Tiles by Paradox
  Version: 1.0.1
  Description: Publishes 5 posts in tiles on the home page.
  Author: Adam Michna
 */

/* Version check */
global $wp_version;
$id;

$exit_msg = '
    WP Tiles by Paradox requires WordPress 4.0 or newer.
    <a href="http://codex.wordpress.org/Upgrading_WordPress">
    Please update!</a>';

if (version_compare($wp_version, "4.0", "<")) {
    exit($exit_msg);
}

function wpTilesInstall() {
    
}

register_activation_hook(__FILE__, 'wpTilesInstall');

function wpTilesScripts() {
    wp_enqueue_style('tilesStyle', plugin_dir_url(__FILE__) . '/style.css');
    wp_enqueue_style('bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css");
}

add_action('wp_enqueue_scripts', 'wpTilesScripts');

function wpTilesShow() {
    $id = uniqid();    
    $posts_from_setting = get_option('tileArr');
    
    if(count($posts_from_setting) >= 5)
    require('views/kafelkiContent.php');
}

add_filter('generate_after_header', 'wpTilesShow');

function wpTilesMenu() {
    add_options_page('Tiles option', 'Tiles plugin', 'manage_options', 'tiles-plugin-menu', 'wpTilesOptions');
}

add_action('admin_init', 'registerMySettings');
add_action('admin_menu', 'wpTilesMenu');

function wpTilesOptions() {    
    
    $posts_array = get_posts(array(
        'posts_per_page'   => -1,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_status' => 'publish'
    ));
    include('admin/wp-tiles-admin.php');
}

function registerMySettings() { 
    register_setting('tiles-settings-group', 'tileArr');
}

?>