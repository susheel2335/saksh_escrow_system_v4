<?php
/*
Plugin Name: Saksh Escrow Email System
Version:  2.1
Stable tag: 2.1
Plugin URI: #
Author: susheelhbti
Author URI: http://www.aistore2030.com/
Description: Saksh Escrow System is a plateform allow parties to complete safe payments.  


*/

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly.
    
}

function aistore_plugin_email_table_install()
{
    global $wpdb;

$table_escrow_email = "CREATE TABLE  IF NOT EXISTS  " . $wpdb->prefix . "escrow_email  (
  id int(100) NOT NULL  AUTO_INCREMENT,
  type varchar(100) NOT NULL,
   message  text  NOT NULL,
   user_email  varchar(100)   NOT NULL,
  url varchar(100)   NOT NULL,
   reference_id bigint(20)   NULL,
   subject varchar(100)  NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (id)
) ";



    require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
    
    
    
  dbDelta($table_escrow_email);
  email_message();
}

register_activation_hook(__FILE__, 'aistore_plugin_email_table_install');

include_once dirname(__FILE__) . '/email_report.php';

include_once dirname(__FILE__) . '/send_email.php';
include_once dirname(__FILE__) . '/menu.php';

  
    
    
function email_message()
{
      //email
    update_option('email_created_escrow', 'You have successfully created the escrow # [EID]');
    update_option('email_partner_created_escrow', 'Your partner have successfully created the escrow # [EID]');
    update_option('email_accept_escrow', 'You have successfully  accepted the escrow # [EID]');
    update_option('email_partner_accept_escrow', 'Your partner have successfully accepted the escrow # [EID]');

    update_option('email_dispute_escrow', 'You have successfully  disputed the escrow # [EID]');
    update_option('email_partner_dispute_escrow', 'Your partner have successfully disputed the escrow # [EID]');
    update_option('email_release_escrow', 'You have successfully  released the escrow # [EID]');
    update_option('email_partner_release_escrow', 'Your partner have successfully released the escrow # [EID]');

    update_option('email_cancel_escrow', 'You have successfully  cancelled the escrow # [EID]');
    update_option('email_partner_cancel_escrow', 'Your partner have successfully cancelled the escrow # [EID]');
    update_option('email_shipping_escrow', 'you have updated the shipping details for the escrow# [EID]');
    update_option('email_partner_shipping_escrow', 'Your partner has updated the shipping details for the escrow# [EID]');

    update_option('email_buyer_deposit', 'Your payment  has been accepted for the escrow  # [EID]');
    update_option('email_seller_deposit', 'You have deposited the payment into  the escrow for  the transaction  escrow # [EID]');
    update_option('email_Buyer_Mark_Paid', 'You have successfully  marked escrow # [EID]');
    
    
    
    //email body
    update_option('email_body_created_escrow', 'Hi,

[ESCROWDATA]

Thanks');
    update_option('email_body_partner_created_escrow', 'Hi,

[ESCROWDATA]

Thanks');
    update_option('email_body_accept_escrow', 'Hi,

[ESCROWDATA]

Thanks');
    update_option('email_body_partner_accept_escrow', 'Hi,

[ESCROWDATA]

Thanks');

    update_option('email_body_dispute_escrow', 'Hi,

[ESCROWDATA]

Thanks');
    update_option('email_body_partner_dispute_escrow', 'Hi,

[ESCROWDATA]

Thanks');
    
    update_option('email_body_release_escrow', 'Hi,

[ESCROWDATA]

Thanks');
    update_option('email_body_partner_release_escrow', 'Hi,

[ESCROWDATA]

Thanks');

    update_option('email_body_cancel_escrow', 'Hi,

[ESCROWDATA]

Thanks');
    update_option('email_body_partner_cancel_escrow', 'Hi,

[ESCROWDATA]

Thanks');
    
    update_option('email_body_shipping_escrow', 'Hi,

[ESCROWDATA]

Thanks');
    update_option('email_body_partner_shipping_escrow', 'Hi,

[ESCROWDATA]

Thanks');

    update_option('email_body_buyer_deposit', 'Hi,

[ESCROWDATA]

Thanks');
    update_option('email_body_seller_deposit', 'Hi,

[ESCROWDATA]

Thanks');
    update_option('email_body_Buyer_Mark_Paid', 'Hi,

[ESCROWDATA]

Thanks');

}   
    