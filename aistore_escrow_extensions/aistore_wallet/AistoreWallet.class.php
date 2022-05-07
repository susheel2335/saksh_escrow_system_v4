<?php
if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly.
    
}

class AistoreWallet
{



  public function aistore_transfer($sender_user_id,$receiver_user_id,  $amount, $currency, $description,$reference)
    {
        
        
       $this->aistore_debit($sender_user_id, $amount, $currency, $description,$reference);
         
         
         $this->aistore_credit($receiver_user_id, $amount, $currency, $description,$reference);
         
         /*
        
        if($this->aistore_balance($sender_user_id, $currency) >= $amount )
     
     {
         
         $this->aistore_debit($sender_user_id, $amount, $currency, $description,$reference);
         
         
         $this->aistore_credit($receiver_user_id, $amount, $currency, $description,$reference);
         
         return true;
     }
            
            else
            {
                return false;
            }
            
            */
    
    }
    
    
    
    
    
    public function aistore_balance($user_id, $currency)
    {
        global $wpdb;
        $w = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}aistore_wallet_balance WHERE  user_id=%s and currency =%s", $user_id, $currency));

        if (is_null($w))
        {
            $balance = 0;
            $transaction_id = 0;
            $q1 = $wpdb->prepare("INSERT INTO {$wpdb->prefix}aistore_wallet_balance  (transaction_id  ,    user_id   ,balance , currency  ) VALUES (%s,%s, %s,%s )", array(
                $transaction_id,
                $user_id,
                $balance,
                $currency
            ));

            $wpdb->query($q1);

            return 0;
        }

        else
        {
            return $w->balance;
        }

    }

    public function aistore_debit($user_id, $amount, $currency, $description,$reference)
    {
        global $wpdb;
        $type = "debit";
        $wallet = new AistoreWallet();
        $old_balance = $wallet->aistore_balance($user_id, $currency);

        $new_amount = $old_balance - $amount;

        $q1 = $wpdb->prepare("INSERT INTO {$wpdb->prefix}aistore_wallet_transactions  (amount, description,type, balance, user_id, currency ,reference) VALUES (%s,%s, %s,%s,%s,%s,%s )", array(
            $amount,
            $description,
            $type,
            $new_amount,
            $user_id,
            $currency,
            $reference
        ));

        $wpdb->query($q1);
        $transaction_id = $wpdb->insert_id;

        $wpdb->query($wpdb->prepare("UPDATE {$wpdb->prefix}aistore_wallet_balance
    SET balance = '%s',transaction_id=%d  WHERE user_id = '%d' and currency=%s", $new_amount, $transaction_id, $user_id, $currency));
    
    
    
    
                
            do_action( 'aistore_wallet_debit',$transaction_id);
            
            
    
    }

    public function aistore_credit($user_id, $amount, $currency, $description,$reference)
    {
        global $wpdb;
        $type = "credit";
        $wallet = new AistoreWallet();
        $old_balance = $wallet->aistore_balance($user_id, $currency);

        $new_amount = $old_balance + $amount;

        $q1 = $wpdb->prepare("INSERT INTO {$wpdb->prefix}aistore_wallet_transactions  (amount,description,type, balance, user_id, currency,reference ) VALUES (%s,%s, %s,%s,%s,%s,%s )", array(
            $amount,
            $description,
            $type,
            $new_amount,
            $user_id,
            $currency,
            $reference
        ));

        $wpdb->query($q1);
        $transaction_id = $wpdb->insert_id;

        $wpdb->query($wpdb->prepare("UPDATE {$wpdb->prefix}aistore_wallet_balance
    SET balance = '%s',transaction_id=%d  WHERE user_id = '%d' and currency=%s", $new_amount, $transaction_id, $user_id, $currency));

                
            do_action( 'aistore_wallet_credit',$transaction_id);
    }

    // transaction List
    public static function aistore_transaction_history()
    {

        if (!is_user_logged_in())
        {

            return "Please login to start";

        } 
        
        ob_start();
?>
   <div>
	 
<?php
        $user_id = get_current_user_id();
        _e( 'Available balance is:', 'aistore' ) ;
       
        
 global $wpdb;

        $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}escrow_currency  order by id desc"
);
 foreach ($results as $row):
$currency=  $row->currency; 
 $wallet = new AistoreWallet();

        $balance = $wallet->aistore_balance($user_id, $currency);

         echo "<br>".esc_attr($balance) . " " . esc_attr($currency);
       
   endforeach;
        $wallet = new AistoreWallet();
        $results = $wallet->aistore_wallet_transaction_history($user_id);

?></div>
<h3><u><?php _e('Transactions', 'aistore'); ?></u> </h3>
<?php
        if ($results == null)
        {
            echo "<div class='no-result'>";

            _e('Transactions List Not Found', 'aistore');
            echo "</div>";
        }
        else
        {

          

?>
  
    <table class="table">
     
        <tr>
      
    <th><?php _e('ID', 'aistore'); ?></th>
    <th><?php _e('Reference', 'aistore'); ?></th>
   
        <th><?php _e('Type', 'aistore'); ?></th>
         <th><?php _e('Balance', 'aistore'); ?></th>
          <th><?php _e('Amount', 'aistore'); ?></th> 
 
		  <th><?php _e('Currency', 'aistore'); ?></th>
		  
		   <th><?php _e('Description', 'aistore'); ?></th> 
		    <th><?php _e('Date', 'aistore'); ?></th> 
		    

		 
</tr>

    <?php
            foreach ($results as $row):

?>    <tr>
          
		   <td>   <?php echo esc_attr($row->transaction_id); ?> </td>
		    <td>   <?php echo esc_attr($row->reference); ?> </td>
  <td> 	   <?php echo esc_attr($row->type); ?> </td>
    <td> 	
 
   <?php echo esc_attr($row->balance) ?>
		  </td>
		   
		  	   <td> 		   <?php echo esc_attr($row->amount) ?>  </td>
		  
		    <td> 		   <?php echo esc_attr($row->currency); ?> </td>
		     <td> 		   <?php echo esc_attr($row->description); ?> </td>
 <td> 		   <?php echo esc_attr($row->date); ?> </td>
            </tr>
    <?php
            endforeach;

        } ?>

    </table>
	
	
	
	
	

    <?php
        return ob_get_clean();

    }

    public function aistore_wallet_transaction_history($user_id)
    {

        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}aistore_wallet_transactions WHERE   user_id=$user_id group by reference order by transaction_id desc";

        return $wpdb->get_results($sql);

    }
    
     public function aistore_wallet_currency()
    {

        global $wpdb;

     $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}escrow_currency  order by id desc");

        return ($results);

    }


}

