<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

require_once( 'legalPages.php' );
$lpObj = new legalPages();
$lpObj->lp_enqueue_editor();
$baseurl = $_SERVER['PHP_SELF'];
$page = isset($_REQUEST['page'])?$_REQUEST['page']:'';
$lptype = isset($_REQUEST['lp-type'])?$_REQUEST['lp-type']:'';
$privacy=__('<h2>Privacy Policy</h2><p>Welcome to [Domain] (the "Site").We understand that privacy online is important to users of our Site, especially when conducting business.This statement governs our privacy policies with respect to those users of the Site ("Visitors") who visit without transacting business and Visitors who register to transact business on the Site and make use of the various services offered by [Business Name] (collectively, "Services") ("Authorized Customers").</p><span style="font-weight: bold;">"Personally Identifiable Information" </span><p>refers to any information that identifies or can be used to identify, contact, or locate the person to whom such information pertains, including, but not limited to, name, address, phone number, fax number, email address, financial profiles, social security number, and credit card information. Personally Identifiable Information does not include information that is collected anonymously (that is, without identification of the individual user) or demographic information not connected to an identified individual.</p><span style="font-weight: bold;">What Personally Identifiable Information is collected? </span><p>We may collect basic user profile information from all of our Visitors. We collect the following additional information from our Authorized Customers: the names, addresses, phone numbers and email addresses of Authorized Customers, the nature and size of the business, and the nature and size of the advertising inventory that the Authorized Customer intends to purchase or sell.</p><span style="font-weight: bold;">What organizations are collecting the information? </span><p>In addition to our direct collection of information, our third party service vendors (such as credit card companies, clearinghouses and banks) who may provide such services as credit, insurance, and escrow services may collect this information from our Visitors and Authorized Customers. We do not control how these third parties use such information, but we do ask them to disclose how they use personal information provided to them from Visitors and Authorized Customers. Some of these third parties may be intermediaries that act solely as links in the distribution chain, and do not store, retain, or use the information given to them.</p><span style="font-weight: bold;">How does the Site use Personally Identifiable Information?</span><p>We use Personally Identifiable Information to customize the Site, to make appropriate service offerings, and to fulfill buying and selling requests on the Site. We may email Visitors and Authorized Customers about research or purchase and selling opportunities on the Site or information related to the subject matter of the Site. We may also use Personally Identifiable Information to contact Visitors and Authorized Customers in response to specific inquiries, or to provide requested information.</p> <span style="font-weight: bold;">With whom may the information may be shared?</span><p>Personally Identifiable Information about Authorized Customers may be shared with other Authorized Customers who wish to evaluate potential transactions with other Authorized Customers. We may share aggregated information about our Visitors, including the demographics of our Visitors and Authorized Customers, with our affiliated agencies and third party vendors. We also offer the opportunity to "opt out" of receiving information or being contacted by us or by any agency acting on our behalf.</p><span style="font-weight: bold;">How is Personally Identifiable Information stored?</span><p>Personally Identifiable Information collected by [Business Name] is securely stored and is not accessible to third parties or employees of [Business Name] except for use as indicated above.</p>   <span style="font-weight: bold;">What choices are available to Visitors regarding collection, use and distribution of the information?</span><p>Visitors and Authorized Customers may opt out of receiving unsolicited information from or being contacted by us and/or our vendors and affiliated agencies by responding to emails as instructed, or by contacting us at [Address]</p><span style="font-weight: bold;">Are Cookies Used on the Site?</span><p>Cookies are used for a variety of reasons. We use Cookies to obtain information about the preferences of our Visitors and the services they select. We also use Cookies for security purposes to protect our Authorized Customers. For example, if an Authorized Customer is logged on and the site is unused for more than 10 minutes, we will automatically log the Authorized Customer off.</p><span style="font-weight: bold;">How does [Business Name] use login information? </span><p>[Business Name] uses login information, including, but not limited to, IP addresses, ISPs, and browser types, to analyze trends, administer the Site, track a user\'s movement and use, and gather broad demographic information.</p><span style="font-weight: bold;">What partners or service providers have access to Personally Identifiable Information from Visitors and/or Authorized Customers on the Site?</span><p>[Business Name] has entered into and will continue to enter into partnerships and other affiliations with a number of vendors.Such vendors may have access to certain Personally Identifiable Information on a need to know basis for evaluating Authorized Customers for service eligibility. Our privacy policy does not cover their collection or use of this information. Disclosure of Personally Identifiable Information to comply with law. We will disclose Personally Identifiable Information in order to comply with a court order or subpoena or a request from a law enforcement agency to release information. We will also disclose Personally Identifiable Information when reasonably necessary to protect the safety of our Visitors and Authorized Customers.</p><span style="font-weight: bold;">How does the Site keep Personally Identifiable Information secure?</span><p>All of our employees are familiar with our security policy and practices. The Personally Identifiable Information of our Visitors and Authorized Customers is only accessible to a limited number of qualified employees who are given a password in order to gain access to the information. We audit our security systems and processes on a regular basis. Sensitive information, such as credit card numbers or social security numbers, is protected by encryption protocols, in place to protect information sent over the Internet. While we take commercially reasonable measures to maintain a secure site, electronic communications and databases are subject to errors, tampering and break-ins, and we cannot guarantee or warrant that such events will not take place and we will not be liable to Visitors or Authorized Customers for any such occurrences. </p><span style="font-weight: bold;">How can Visitors correct any inaccuracies in Personally Identifiable Information?</span><p>Visitors and Authorized Customers may contact us to update Personally Identifiable Information about them or to correct any inaccuracies by emailing us at [Email] </p><span style="font-weight: bold;">Can a Visitor delete or deactivate Personally Identifiable Information collected by the Site?</span><p>We provide Visitors and Authorized Customers with a mechanism to delete/deactivate Personally Identifiable Information from the Site\'s database by contacting . However, because of backups and records of deletions, it may be impossible to delete a Visitor\'s entry without retaining some residual information. An individual who requests to have Personally Identifiable Information deactivated will have this information functionally deleted, and we will not sell, transfer, or use Personally Identifiable Information relating to that individual in any way moving forward. </p><span style="font-weight: bold;">What happens if the Privacy Policy Changes?</span><p>We will let our Visitors and Authorized Customers know about changes to our privacy policy by posting such changes on the Site. However, if we are changing our privacy policy in a manner that might cause disclosure of Personally Identifiable Information that a Visitor or Authorized Customer has previously requested not be disclosed, we will contact such Visitor or Authorized Customer to allow such Visitor or Authorized Customer to prevent such disclosure.</p><span style="font-weight: bold;">Links:</span><p>[Domain] contains links to other web sites. Please note that when you click on one of these links, you are moving to another web site. We encourage you to read the privacy statements of these linked sites as their privacy policies may differ from ours.</p>','legal-pages');
?>
<div style="width:1000px;float:left;">
	<h1>WP Legal Pages</h1>
</div>
	<div style="clear:both;"></div>
<div class="wrap">
<?php
if(!empty($_POST) && $_POST['lp-submit']=='Publish') :
$title = $_POST['lp-title'];
$content = $_POST['lp-content'];
$post_args = array(
					'post_title' => apply_filters( 'the_title', $title ),
					'post_content' => $content,
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_author' => 1
				);
$pid = wp_insert_post( $post_args );

update_post_meta($pid,'is_legal','yes');
$url = get_permalink($pid);
 ?>
	<div id="message" class="updated">
    	<p>Page Successfully Created. You can view your page as a normal Page in Pages Menu. </p>
        <p><a href="<?php echo get_admin_url(); ?>/post.php?post=<?php echo $pid;?>&action=edit">Edit</a> | <a href="<?php echo esc_url($url); ?>">View</a></p>
    </div>
<?php
	  endif;
	 
	  $general = get_option('wpgattack_general');
	  $checked = 'checked="checked"'; $selected = 'selected="selected"';
?>

<?php
    global $wpdb; 
	$postTbl = $wpdb->prefix . "posts";
	$postmetaTbl = $wpdb->prefix . "postmeta";
	$countofPages = $wpdb->get_results("SELECT count(meta_id) as cntPages FROM $postTbl, $postmetaTbl
			WHERE $postTbl.ID = $postmetaTbl.post_id and $postTbl.post_status='publish'
			AND $postmetaTbl.meta_key =  'is_legal'");
	if($countofPages[0]->cntPages<15){
?>

<div class="postbox ">
	<h3 class="hndle"> Create Page:</h3>
    <div id="lp_generalid">
 
    <p>&nbsp;&nbsp;</p>
        <form name="terms" method="post" enctype="multipart/form-data">
        	<p><input type="text" name="lp-title" id="lp-title" value="<?php echo isset($row->title)?$row->title:'Privacy Policy';?>" /></p>
            <p>
            <div id="poststuff">
                <div id="<?php echo user_can_richedit() ? 'postdivrich' : 'postdiv'; ?>" >
                	<?php 
					$content = isset($row->content)?$row->content:$privacy;
					$lp_find = array("[Domain]","[Business Name]","[Phone]","[Street]","[City, State, Zip code]","[Country]","[Email]","[Address]","[Niche]");
			$lp_general = get_option('lp_general');
			
$editor_id = 'lp-content';
$args = array(); 
wp_editor(stripslashes(html_entity_decode($content)),$id = 'content',$args);
?>
                </div>
                    <script type="text/javascript">
                    
                    function sp_content_save(){
                        var obj = document.getElementById('lp-content');
                        var content = document.getElementById('content');
                        tinyMCE.triggerSave(0,1);
                        obj.value = content.value;
                    }
                        
                    </script>
                    <textarea id="lp-content" name="lp-content" value="5" style="display:none" rows="10"></textarea>
            </div></p>
            <p>
            <input type="submit" onclick="sp_content_save();" name="lp-submit" value="Publish" />
            </p>
        
        </form>
    </div>
  
<?php } else { ?>
		<div id="message" class="updated">
	    	<p>You are exceeding the limit of creating 15 legal pages.</p>
	        
	    </div>
<?php }?>
