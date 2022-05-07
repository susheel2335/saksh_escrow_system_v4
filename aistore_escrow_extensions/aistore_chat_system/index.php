<?php
/*
Plugin Name: Aistore Chat System
Version:  2.1
Stable tag: 2.1
Plugin URI: #
Author: susheelhbti
Author URI: http://www.aistore2030.com/
Description: Aistore Chat System is a plateform allow parties to complete safe payments.  


*/


if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly.
    
}

function aistore_st_scripts_method()
{
     wp_enqueue_script( 'bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', array('jquery'), NULL, true );
     
   wp_enqueue_style( 'bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', false, NULL, 'all' );
    wp_enqueue_style('aistore', plugins_url('/css/chat.css', __FILE__) , array());
    // wp_enqueue_style('aistore', plugins_url('/css/custom.css', __FILE__) , array());
    wp_enqueue_script('aistore', plugins_url('/js/chat.js', __FILE__) , array(
        'jquery'
    ));
     wp_enqueue_script( 'ajax-script', plugins_url( '/js/chat.js', __FILE__ ), array('jquery') );

// in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value

wp_localize_script( 'ajax-script', 'ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
}

add_action('wp_enqueue_scripts', 'aistore_st_scripts_method');


function aistore_chat_plugin_table_install()
{
    global $wpdb;

    $table_chat_discussion = "CREATE TABLE   IF NOT EXISTS  " . $wpdb->prefix . "escrow_discussion  (
  id int(100) NOT NULL  AUTO_INCREMENT,
  eid int(100) NOT NULL,
   message  text  NOT NULL,
   user_login  varchar(100)   NOT NULL,
  status  varchar(100)   NOT NULL,
  ipaddress varchar(100)   NOT NULL,
   created_at  timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (id)
) ";


 require_once (ABSPATH . 'wp-admin/includes/upgrade.php');

    dbDelta($table_chat_discussion);

}

register_activation_hook(__FILE__, 'aistore_chat_plugin_table_install');

include_once dirname(__FILE__) . '/Aistorechat.class.php';


add_shortcode('aistore_escrow_chat', array(
    'Aistorechat',
    'aistore_escrow_chat'
));

 