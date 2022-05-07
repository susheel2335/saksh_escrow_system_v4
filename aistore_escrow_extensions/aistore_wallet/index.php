<?php
/*
Plugin Name: Saksh Wallet System
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



 include_once dirname(__FILE__) . '/transactions/aistore_transaction_report.php';

include_once dirname(__FILE__) . '/admin/user_transaction_list.php';
include_once dirname(__FILE__) . '/admin/transaction_list.php';
include_once dirname(__FILE__) . '/admin/user_balance.php';
include_once dirname(__FILE__) . '/AistoreWallet.class.php';
 include_once dirname(__FILE__) . '/Aistore_WithdrawalSystem.class.php';
 include_once dirname(__FILE__) . '/Widthdrawal_requests.php';
 include_once dirname(__FILE__) . '/user_bank_details.php';
 include_once dirname(__FILE__) . '/menu.php';


add_shortcode('aistore_transaction_history', array(
    'AistoreWallet',
    'aistore_transaction_history'
));

 add_shortcode('aistore_saksh_withdrawal_system', array(
    'Aistore_WithdrawalSystem',
    'aistore_saksh_withdrawal_system'
));
 
 
  add_shortcode('aistore_bank_account', array(
    'Aistore_WithdrawalSystem',
    'aistore_bank_account'
));




    
     add_action('aistore_escrow_tab_button', 'aistore_escrow_transactions_tab_button' ); 
     
     function aistore_escrow_transactions_tab_button($escrow)
{
   
    ?>
      <button class="nav-link" id="nav-transactions-tab" data-bs-toggle="tab" data-bs-target="#nav-transactions" type="button" role="tab" aria-controls="nav-transactions" aria-selected="false">   Transactions</button>
      
      <?php
      
      
}




    add_action('aistore_escrow_tab_contents', 'aistore_escrow_transactions_tab_contents' ); 
     
     function aistore_escrow_transactions_tab_contents($escrow)
{
   
    
    
    ?> 
     
   <div class="tab-pane fade show active" id="nav-transactions" role="tabpanel" aria-labelledby="nav-transactions-tab">
         
 <?php  aistore_transaction_report($escrow); ?>
 
 
  </div>
      
      <?php
      
       
}




