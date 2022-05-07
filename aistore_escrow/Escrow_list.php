<?php
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Escrow_List extends WP_List_Table {

	/** Class constructor */
	public function __construct() {

		parent::__construct( [
			'singular' => __( 'Escrow', 'sp' ), //singular name of the listed records
			'plural'   => __( 'Escrow', 'sp' ), //plural name of the listed records
			'ajax'     => false //does this table support ajax?
		] );

	}
	
	
	 
	 
	 

public function status_filter( $text, $input_id ) {


 
        if ( empty( $_REQUEST['s'] ) && ! $this->has_items() ) {
            return;
        }
 
        $input_id = $input_id . '-search-input';
 
        if ( ! empty( $_REQUEST['orderby'] ) ) {
            echo '<input type="hidden" name="orderby" value="' . esc_attr(sanitize_text_field( $_REQUEST['orderby'] ) ). '" />';
        }
        if ( ! empty( $_REQUEST['order'] ) ) {
            echo '<input type="hidden" name="order" value="' .esc_attr( sanitize_text_field( $_REQUEST['order'] )) . '" />';
        }
        if ( ! empty( $_REQUEST['post_mime_type'] ) ) {
            echo '<input type="hidden" name="post_mime_type" value="' .esc_attr(sanitize_text_field( $_REQUEST['post_mime_type'] )) . '" />';
        }
        if ( ! empty( $_REQUEST['detached'] ) ) {
            echo '<input type="hidden" name="detached" value="' . esc_attr(sanitize_text_field( $_REQUEST['detached'] ) ). '" />';
        }
        ?>
		 
    
<p class="search-box">
  <label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr($text); ?>:</label>
 
 
 
<select name="search_column"  >
  <option value="id">ID</option>
 
  <option value="sender_email">Sender Email</option>
  <option value="receiver_email">Receiver Email</option>
  
    <option value="amount">Amount</option>
  
  
  
  
  
</select>


<select name="search_operator"  >

    <option value="=">Equal </option>
	
    <option value="!=">Not equal </option>
	
    <option value="LIKE">Contains </option>
    <option value="NOT LIKE">Not Contains </option> 
	
  <option value=">">Greater than</option>
 
  <option value=">=">Greater than or equal </option>
  <option value="<">Less than </option>
  
   <option value="<=">Less than or equal</option> 
  
  
  
  
  
</select>


     <input type="search" id="<?php echo esc_attr( $input_id ); ?>" name="s" value="<?php _admin_search_query(); ?>" />
        <?php submit_button( esc_attr($text), '', '', false, array( 'id' => 'search-submit' ) ); ?>
</p>
        <?php
    }

public function date_filter( $text, $input_id ) {
        if ( empty( $_REQUEST['s'] ) && ! $this->has_items() ) {
            return;
        }
 
        $input_id = $input_id . ' ';
 
        if ( ! empty( $_REQUEST['orderby'] ) ) {
            echo '<input type="hidden" name="orderby" value="' . esc_attr(sanitize_text_field( $_REQUEST['orderby'] ) ). '" />';
        }
        if ( ! empty( $_REQUEST['order'] ) ) {
            echo '<input type="hidden" name="order" value="' . esc_attr(sanitize_text_field( $_REQUEST['order'] )) . '" />';
        }
        if ( ! empty( $_REQUEST['post_mime_type'] ) ) {
            echo '<input type="hidden" name="post_mime_type" value="' .esc_attr( sanitize_text_field( $_REQUEST['post_mime_type'] ) ). '" />';
        }
        if ( ! empty( $_REQUEST['detached'] ) ) {
            echo '<input type="hidden" name="detached" value="' .esc_attr( sanitize_text_field( $_REQUEST['detached'] ) ). '" />';
        }
        ?>
		
		
	 <input type="hidden" name="date_filter" value="1" /> 
		
	  
     Start Date <input type='date' class='dateFilter' name='fromDate' value='<?php if(isset($_POST['fromDate'])) echo esc_attr(sanitize_text_field($_POST['fromDate'])); ?>'>
 
     End Date <input type='date' class='dateFilter' name='endDate' value='<?php if(isset($_POST['endDate'])) echo esc_attr(sanitize_text_field($_POST['endDate'])); ?>'>

  
     
        <?php submit_button( $text, '', '', false, array( 'id' => 'search-submit' ) ); ?>
 
        <?php
    }


public function search_box( $text, $input_id ) {
        if ( empty( $_REQUEST['s'] ) && ! $this->has_items() ) {
            return;
        }
 
        $input_id = $input_id . '-search-input';
 
        if ( ! empty( $_REQUEST['orderby'] ) ) {
            echo '<input type="hidden" name="orderby" value="' . esc_attr(sanitize_text_field( $_REQUEST['orderby'] ) ). '" />';
        }
        if ( ! empty( $_REQUEST['order'] ) ) {
            echo '<input type="hidden" name="order" value="' . esc_attr(sanitize_text_field( $_REQUEST['order'] )) . '" />';
        }
        if ( ! empty( $_REQUEST['post_mime_type'] ) ) {
            echo '<input type="hidden" name="post_mime_type" value="' .esc_attr( sanitize_text_field( $_REQUEST['post_mime_type'] ) ). '" />';
        }
        if ( ! empty( $_REQUEST['detached'] ) ) {
            echo '<input type="hidden" name="detached" value="' .esc_attr( sanitize_text_field( $_REQUEST['detached'] )) . '" />';
        }
        ?>
		 
    
<p class="search-box">
  <label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr($text); ?>:</label>
 
 
<select name="search_column"  >
  <option value="id">ID</option>
 
  <option value="sender_email">Sender Email</option>
  <option value="receiver_email">Receiver Email</option>
  
    <option value="amount">Amount</option>
  
  
  
  
  
  
</select>


<select name="search_operator"  >

    <option value="=">Equal </option>
	
    <option value="!=">Not equal </option>
	
    <option value="LIKE">Contains </option>
    <option value="NOT LIKE">Not Contains </option> 
	
  <option value=">">Greater than</option>
 
  <option value=">=">Greater than or equal </option>
  <option value="<">Less than </option>
  
   <option value="<=">Less than or equal</option> 
  
  
  
  
  
</select>


     <input type="search" id="<?php echo esc_attr( $input_id ); ?>" name="s" value="<?php _admin_search_query(); ?>" />
        <?php submit_button( $text, '', '', false, array( 'id' => 'search-submit' ) ); ?>
</p>
        <?php
    }

	/**
	 * Retrieve customers data from the database
	 *
	 * @param int $per_page
	 * @param int $page_number
	 *
	 * @return mixed
	 */
	public static function get_escrow( $per_page = 5, $page_number = 1 ) {

		global $wpdb;

			if( empty( $_REQUEST['id'] ) ){
		$sql = "SELECT * FROM {$wpdb->prefix}escrow_system  WHERE 1=1 ";
			}
		
		else{
		  
$id=sanitize_text_field($_REQUEST['id']);

$user_email = get_the_author_meta( 'user_email', $id );


		$sql = "SELECT * FROM {$wpdb->prefix}escrow_system  WHERE (sender_email='$user_email' or receiver_email='$user_email' ) ";
}
$sql .=  Escrow_List::prepareWhereClouse();



		if ( ! empty( $_REQUEST['orderby'] ) ) {
			$sql .= ' ORDER BY ' . sanitize_text_field( $_REQUEST['orderby'] );
			$sql .= ! empty( $_REQUEST['order'] ) ? ' ' . sanitize_text_field( $_REQUEST['order'] ) : 'DESC';
		}
		
		else{
			
			$sql .= ' ORDER BY  created_at desc';
		}

		$sql .= " LIMIT $per_page";
		$sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;


//echo $sql;
		$result = $wpdb->get_results( $sql, 'ARRAY_A' );

		return $result;
	}

	public  static function prepareWhereClouse() {
		$sql="";
		
		
		


		if( ! empty( $_REQUEST['date_filter'] ) ){
           $fromDate = sanitize_text_field($_POST["fromDate"]);
      $endDate   =sanitize_text_field($_POST["endDate"]); 

    //sql will be 
    $sql .= "and  DATE('created_at') BETWEEN '{$fromDate}' AND '{$endDate}'  ";
 

  }
  
  


		if( ! empty( $_REQUEST['s'] ) ){
         $search = sanitize_text_field( $_REQUEST['s'] );
		  $search_column=sanitize_text_field( $_REQUEST['search_column'] ); 
		  $search_operator=sanitize_text_field( $_REQUEST['search_operator'] ); 
		 
   if($search_operator=="LIKE")
   { $sql .= " and   ". $search_column."  ".$search_operator." '%{$search}%'  "; }
else
{ $sql .= " and   ". $search_column."  ".$search_operator." '". $search ."'  ";
	
}
  }
	
	
	return   $sql ;
	
	}

	/**
	 * Delete a customer record.
	 *
	 * @param int $id customer ID
	 */
	public static function delete_escrow( $id ) {
		global $wpdb;

		$wpdb->delete(
			"{$wpdb->prefix}escrow_system",
			[ 'ID' => $id ],
			[ '%d' ]
		);
	}



		public static function remove_payment_escrow( $id ) {
		global $wpdb;

		$wpdb->delete(
			"{$wpdb->prefix}escrow_system",
			[ 'ID' => $id ],
			[ '%d' ]
		);
	}


	/**
	 * Returns the count of records in the database.
	 *
	 * @return null|string
	 */
	public static function record_count() {
		global $wpdb;

		$sql = "SELECT COUNT(*) FROM {$wpdb->prefix}escrow_system where 1 =1   ";

$sql .=  Escrow_List::prepareWhereClouse();

		return $wpdb->get_var( $sql );
	}


	/** Text displayed when no customer data is available */
	public function no_items() {
		_e( 'No escrow  avaliable.', 'sp' );
	}


	/**
	 * Render a column when no column specific method exist.
	 *
	 * @param array $item
	 * @param string $column_name
	 *
	 * @return mixed
	 */
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'id':
			case 'title':
			case 'sender_email':
			case 'receiver_email':	
			case 'amount':	
			case 'payment_status':
			case 'status':
			case 'created_at':
				return $item[ $column_name ];
			default:
				return print_r( $item, true ); //Show the whole array for troubleshooting purposes
		}
	}

	/**
	 * Render the bulk edit checkbox
	 *
	 * @param array $item
	 *
	 * @return string
	 */
	function column_cb( $item ) {
		return sprintf(
			'<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['id']
		);
			return sprintf(
			'<input type="checkbox" name="bulk-remove_payment[]" value="%s" />', $item['id']
		);
	}


	/**
	 * Method for name column
	 *
	 * @param array $item an array of DB data
	 *
	 * @return string
	 */
	function column_name( $item ) {

		$delete_nonce = wp_create_nonce( 'sp_delete_escrow' );
		$remove_payment_nonce = wp_create_nonce( 'sp_remove_payment_escrow' );

		$title = '<strong>' . $item['title'] . '</strong>';

		$actions = [
		'delete' => sprintf( '<a href="?page=%s&action=%s&escrow=%s&_wpnonce=%s">Delete</a>', sanitize_text_field( $_REQUEST['page'] ), 'delete', absint( $item['id'] ), $delete_nonce )
		];
		
			$actions_payment = [
		'remove_payment' => sprintf( '<a href="?page=%s&action=%s&escrow=%s&_wpnonce=%s">Remove Payment</a>', sanitize_text_field( $_REQUEST['page'] ), 'remove_payment', absint( $item['id'] ), $remove_payment_nonce )
		];

		return $title . $this->row_actions( $actions );
		return $title . $this->row_actions( $actions_payment );
	}


	/**
	 *  Associative array of columns
	 *
	 * @return array
	 */
	function get_columns() {
		$columns = [
			'cb'      => '<input type="checkbox" />',
			'id' => __( 'Id', 'sp' ),
			'title' => __( 'Title', 'sp' ),
			'sender_email'    => __( 'Sender', 'sp' ),
			'receiver_email'    => __( 'Receiver', 'sp' ),
			'amount'    => __( 'Amount', 'sp' ),
 		    'payment_status'    => __( 'Payment Status', 'sp' ),
			'status' => __( 'Status', 'sp' ),
			'created_at'    => __( 'Date', 'sp' )
		];

		return $columns;
	}


	/**
	 * Columns to make sortable.
	 *
	 * @return array
	 */
	public function get_sortable_columns() {
		$sortable_columns = array(
			'id' => array( 'id', true ),
			'title' => array( 'title', true ),
			'sender_email' => array( 'sender_email', false ),
			'receiver_email' => array( 'receiver_email', false ),
			'amount' => array( 'amount', false ),
            'payment_status' => array( 'payment_status', true ),
			'status' => array( 'status', true ),
			'created_at' => array( 'created_at', false ),
		
		);
		

		return $sortable_columns;
	}

	/**
	 * Returns an associative array containing the bulk action
	 *
	 * @return array
	 */
	public function get_bulk_actions() {
		$actions = [
			'bulk-delete' => 'Delete',
	     'bulk-removepayment' => 'Remove payment',
	      'bulk-approvepayment' => 'Approve payment'
		];

		return $actions;
	}

function form(){
 
		$from = ( isset($_GET['EscrowDateFrom'] ) && sanitize_text_field($_GET['EscrowDateFrom']) ) ? sanitize_text_field($_GET['EscrowDateFrom']) : '';
		$to = ( isset($_GET['EscrowDateTo'] ) && sanitize_text_field($_GET['EscrowDateTo']) ) ? sanitize_text_field($_GET['EscrowDateTo']) : '';
 
		echo ' 
 
		<input type="date" name="EscrowDateFrom" placeholder="Date From" value="' . esc_attr( $from ) . '" />
		<input type="date" name="EscrowDateTo" placeholder="Date To" value="' . esc_attr( $to ) . '" />
 
		 ';
 
	}
 
 
 
	/**
	 * Handles data query and filter, sorting, and pagination.
	 */
	public function prepare_items() {

		$this->_column_headers = $this->get_column_info();

		/** Process bulk action */
		$this->process_bulk_action();

		$per_page     = $this->get_items_per_page( 'customers_per_page', 20 );
		$current_page = $this->get_pagenum();
		$total_items  = self::record_count();

		$this->set_pagination_args( [
			'total_items' => $total_items, //WE have to calculate the total number of items
			'per_page'    => $per_page //WE have to determine how many items to show on a page
		] );

		$this->items = self::get_escrow( $per_page, $current_page );
	}

	public function process_bulk_action() {

		//Detect when a bulk action is being triggered...
		if ( 'delete' === $this->current_action() ) {

			// In our file that handles the request, verify the nonce.
			$nonce = sanitize_text_field( $_REQUEST['_wpnonce'] );

			if ( ! wp_verify_nonce( $nonce, 'sp_delete_escrow' ) ) {
				die( 'Go get a life script kiddies' );
			}
			else {
				self::delete_escrow( absint( $_GET['customer'] ) );

		                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
		                // add_query_arg() return the current url
		                wp_redirect( esc_url_raw(add_query_arg()) );
				exit;
			}

		}

		// If the delete bulk action is triggered
		if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-delete' )
		     || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-delete' )
		) {

			$delete_ids = sanitize_text_field( $_POST['bulk-delete'] );

			// loop over the array of record IDs and delete them
			foreach ( $delete_ids as $id ) {
				self::delete_escrow( $id );

			}

			// esc_url_raw() is used to prevent converting ampersand in url to "#038;"
		        // add_query_arg() return the current url
		        wp_redirect( esc_url_raw(add_query_arg()) );
			exit;
		}
		
		
		
		
// payment

//Detect when a bulk action is being triggered...
		if ( 'remove_payment' === $this->current_action() ) {

			// In our file that handles the request, verify the nonce.
			$nonce = sanitize_text_field( $_REQUEST['_wpnonce'] );

			if ( ! wp_verify_nonce( $nonce, 'sp_remove_payment_escrow' ) ) {
				die( 'Go get a life script kiddies' );
			}
			else {
				self::remove_payment_escrow( absint( $_GET['customer'] ) );

		                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
		                // add_query_arg() return the current url
		                wp_redirect( esc_url_raw(add_query_arg()) );
				exit;
			}

		}

		// If the delete bulk action is triggered
		if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-removepayment' )
		     || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-removepayment' )
		) {

			$delete_ids = sanitize_text_field( $_POST['bulk-removepayment'] );

			// loop over the array of record IDs and delete them
			foreach ( $delete_ids as $id ) {
				self::remove_payment_escrow( $id );

			}

			// esc_url_raw() is used to prevent converting ampersand in url to "#038;"
		        // add_query_arg() return the current url
		        wp_redirect( esc_url_raw(add_query_arg()) );
			exit;
		}
		
	}

}


class Escrow_Plugin {

	// class instance
	static $instance;

	// customer WP_List_Table object
	public $escrow_obj;

	// class constructor
	public function __construct() {
		add_filter( 'set-screen-option', [ __CLASS__, 'set_screen' ], 10, 3 );
		add_action( 'admin_menu', [ $this, 'plugin_menu' ] );
	}


	public static function set_screen( $status, $option, $value ) {
		return $value;
	}

	public function plugin_menu() {

		$hook = add_menu_page(
			'All Escrow List',
			'Escrow List',
			'manage_options',
			'escrow_list',
			[ $this, 'plugin_settings_page' ]
		);

		add_action( "load-$hook", [ $this, 'screen_option' ] );

	}


	/**
	 * Plugin settings page
	 */
	public function plugin_settings_page() {
		?>
		<div class="wrap">
			<h2>Escrows Report</h2>

 <?php echo AistoregetSupportMsg(); ?>
 
 
			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">
					<div id="post-body-content">
						<div class="meta-box-sortables ui-sortable">
							<form method="post">
								<?php
								$this->escrow_obj->prepare_items();
		

 
	
	   $this->escrow_obj->status();
	   
	   
	   $this->escrow_obj->date_filter('Search', 'search');
	   
	   
	
	   $this->escrow_obj->search_box('Search', 'search');
	$this->escrow_obj->display(); 
								
								 ?>
									
									 
								
							</form>
						</div>
					</div>
				</div>
				<br class="clear">
			</div>
		</div>
	<?php
	}

	/**
	 * Screen options
	 */
	public function screen_option() {

		$option = 'per_page';
		$args   = [
			'label'   => 'escrow_system',
			'default' => 5,
			'option'  => 'escrows_per_page'
		];

		add_screen_option( $option, $args );

		$this->escrow_obj = new Escrow_List();
	}


	/** Singleton instance */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}


add_action( 'plugins_loaded', function () {
	Escrow_Plugin::get_instance();
} );
