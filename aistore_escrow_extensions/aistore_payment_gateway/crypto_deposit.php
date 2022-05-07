<?php


// this include 2 section 

// section 1 show form 
 
// section 2 notification handling so that form status can be updated

add_filter( 'payment_method_list', 'aistore_escrow_payment_method_list' );


function aistore_escrow_payment_method_list( $escrow ) {
    
    
 $aep=new AistoreEscrowPayment();
 
 return $aep->payment_form( $escrow );
 
    
}

class AistoreEscrowPayment  
{

 
function payment_form( $escrow ) {
    
    $payable_amount=$escrow->amount+$escrow->escrow_fee;
    
    $notify_url=home_url()."/wp-json/aistore_escrow_payment/v1/notify_url";
    
    
?>

 <form method="post" action="<?php echo $notify_url."?ecsrow_id=".$escrow->id; ?>" name="escrow_payment" enctype="multipart/form-data"> 

<?php wp_nonce_field('aistore_nonce_action', 'aistore_nonce'); ?>



<input type="hidden" name="action" value="escrow_payment" />


<input type="text" name="deposit_address" value="bc1qhhclmfykhzdusdrdazzz3nl9wqtj5qc6fmxmtm" />


<input type="text" name="amount" value="<?php echo  $payable_amount;?>" />


<input type="hidden" name="escrow_id" value="<?php echo $escrow->id;?>" />

<input type="text" name="notify_url" value="<?php echo $notify_url."?ecsrow_id=".$escrow->id; ?>" />

<input type="hidden" name="return_url" value="<?php echo $escrow->url;?>" />


<input type="submit"  class="button button-primary  btn  btn-primary "    name="submit" value="<?php _e('Make Payment', 'aistore') ?>"/>
 
 

                </form>
                
            <?php     
                
}

 


// this will run in the background and update the escrow payment status
function webhook()
{
    
   
         $eid = sanitize_text_field($_REQUEST['ecsrow_id']);
         
         
$object_escrow = new AistoreEscrowSystem();

$escrow = $object_escrow->AistoreGetEscrow($eid);

$sender = get_user_by('email', $escrow->sender_email);

$escrow_wallet = new AistoreWallet();

$new_amount = $escrow->escrow_fee + $escrow->amount;

$escrow_wallet->aistore_credit($sender->id, $new_amount, $escrow->currency, 'Deposit Payment To User Account  with escrow id # ' . $eid, $eid);

//$escrow_wallet->aistore_credit($sender->id, 1000000, $escrow->currency, 'Deposit Payment To User Account  with escrow id test # ' . $eid,  1);


   $object_escrow->AistoreEscrowMarkPaid($escrow);
   
   
 echo '  <meta http-equiv = "refresh" content = "0; url = '.$escrow->url.'" />';
   
 

               
}

}

 