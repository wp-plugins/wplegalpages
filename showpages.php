<?php 

if ( ! defined( 'ABSPATH' ) ) exit;
require_once( 'legalPages.php' );

$page = isset($_REQUEST['page'])?$_REQUEST['page']:'';
$nonce = isset($_REQUEST['_wpnonce'])? $_REQUEST['_wpnonce']:'';

if( (isset($_REQUEST['mode']) && $_REQUEST['mode']=='delete' && current_user_can('manage_options')))

{	

 	if(! wp_verify_nonce( $nonce,'my-nonce' ))
 	{
 		wp_die( __('Security Check.') );
 	}
 	
	if ( ! wp_trash_post($_REQUEST['pid']) )
		wp_die( __('Error in moving to Trash.') );
?>
		<div id="message" class="updated">
	    	<p>Legal page moved to trash.</p>	        
	    </div>

<?php 	
}
?>

<h2> Available Pages </h2>
<table class="widefat fixed comments">
    <thead>
    	<tr>
    		<th width="5%">S.No.</th>
           	 <th width="30%">Page Title</th>
    		 <th width="10%">Author</th>
    		 <th width="10%">Date</th>
            <th width="15%">Action</th>
    	</tr>
    </thead>
    <tbody>
    
    <?php   
            global $wpdb;
			$postTbl = $wpdb->prefix . "posts";
			$postmetaTbl = $wpdb->prefix . "postmeta";
			$pagesresult = $wpdb->get_results("SELECT $postTbl . * 
					FROM $postTbl, $postmetaTbl
					WHERE $postTbl.ID = $postmetaTbl.post_id and $postTbl.post_status='publish'
					AND $postmetaTbl.meta_key =  'is_legal'");
			
			if( $pagesresult ) { ?>
 
            <?php
            $nonce = wp_create_nonce( 'my-nonce' );
            $count = 1;
            $userTbl = $wpdb->prefix . "users";
            foreach( $pagesresult as $res ) {
      			$url = get_permalink($res ->ID);  
      			$author = $wpdb->get_results("SELECT $userTbl.user_login FROM $postTbl, $userTbl WHERE $postTbl.post_author = $userTbl.ID and $postTbl.ID = ".$res ->ID);      			
      			$delurl =   $_SERVER['PHP_SELF'].'?pid='.$res->ID.'&page='.$page.'&mode=delete'.'&_wpnonce='.$nonce;
      		 
      ?>
             <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $res -> post_title; ?></td>
                <td><?php echo ucfirst($author[0]->user_login); ?></td>
                <td><?php echo date("Y/m/d", strtotime($res->post_date)); ?></td>
                <td>
                   <a href="<?php echo get_admin_url(); ?>/post.php?post=<?php echo $res ->ID;?>&action=edit">Edit</a> | <a href="<?php echo $url; ?>">View</a>| <a href="<?php echo $delurl;?>">Trash</a>                </td>
            </tr>
            <?php
                $count++;
            }
            ?>
 
        <?php } else { ?>
        <tr>
            <td colspan="3">No page yet</td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
        <tr>
    		
    		<th width="5%">S.No.</th>
           	 <th width="30%">Page Title</th>
    		 <th width="10%">Author</th>
    		 <th width="10%">Date</th>
            <th width="15%">Action</th>  
    	</tr>
    </tfoot>
 </table>
