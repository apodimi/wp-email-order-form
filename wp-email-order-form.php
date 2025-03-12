<?php
/**
 * Plugin Name: WP Email order form
 * Description: An order form via email
 * Version: 1.0
 * Author: Apostolis Dimitriou
 */

if (!defined('ABSPATH')) exit;


include_once plugin_dir_path(__FILE__) . 'includes/form-handler.php';
include_once plugin_dir_path(__FILE__) . 'includes/form-display.php';


function register_product_contact_form() {
    return display_product_form(); 
}
add_shortcode('product_contact_form', 'register_product_contact_form');


function load_wp_product_form_assets() {
    wp_enqueue_style('wp-email-order-form-css', plugin_dir_url(__FILE__) . 'assets/styles.css');
    wp_enqueue_script('wp-email-order-form-js', plugin_dir_url(__FILE__) . 'assets/scripts.js', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'load_wp_product_form_assets');
