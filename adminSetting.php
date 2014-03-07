<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

require_once( 'legalPages.php' );
$lpObj = new legalPages();
$baseurl = $_SERVER['PHP_SELF'];

if(isset($_POST['lp_submit']) && $_POST['lp_submit']=='Accept'){
	update_option('lp_accept_terms',$_POST['lp_accept_terms']);
}
?>
<div style="width:1000px;float:left;">
	<h1>WP Legal Pages</h1>
	<p>Wp Legal Pages is a simple 1 click legal page management plugin. You can quickly add in legal pages to your wordpress sites. Furthermore the business information you fill in the general settings will be automatically filled into the appropriate places within the pages due to our custom integration system we have. The icing on the cake is the hosting of unlimited popups that force the visitor to agree to your terms before the page unlocks.</p>
  <div style="line-height: 2.4em;">

<span style="color: #000000;">Get WPLegalPages Advanced with 17+ Templates, Unlimited Template Creation Option, Premium Support and EU cookie policy features.</span>
<div style="font-size: 16px;"><span style="color: #000000;">WPLegalPages is available now on </span><span style="color: #333399;"><a title="WPEka" href="http://club.wpeka.com/product/wplegalpages/" target="_blank"><span style="color: #333399;"><strong>WPEKa Club</strong></span></a></span><span style="color: #000000;"> . Use <span style="color: #ff0000;"><span style="color: #000000;">COUPON</span><strong> WPEKALPWP</strong></span> to get <span style="color: #ff0000;"><strong>20%</strong></span> off on WPEka Platinum Plan.</span></div>
</div></div>	<div style="clear:both;"></div>
<?php 
wp_enqueue_script('jquery');
$lpterms = get_option('lp_accept_terms');
if($lpterms==1){?>
<div class="wrap">
<?php
if(!empty($_POST) && isset($_POST['lp-greset']) && $_POST['lp-greset']=='Reset') : 
$lp_general = array(
				'domain' => '',
				'business' => '',
				'phone' => '',
				'street' => '',
				'cityState' => '',
				'country' => '',
				'email' => '',
				'address' => '',
				'niche' => '',
				'pagefooter' => '',
				);
update_option('lp_general',$lp_general);
?>
	<div id="message" class="updated">
    	<p>Settings Reset.</p>
    </div>
<?php
	  endif;
	  if(!empty($_POST) && isset($_POST['lp-gsubmit']) && $_POST['lp-gsubmit']=='Save') : 
	  
$lp_general = array(
				'domain' => sanitize_text_field($_POST['lp-domain-name']),
				'business' =>sanitize_text_field( $_POST['lp-business-name']),
				'phone' => sanitize_text_field($_POST['lp-phone']),
				'street' => sanitize_text_field($_POST['lp-street']),
				'cityState' => sanitize_text_field($_POST['lp-city-state']),
				'country' => sanitize_text_field($_POST['lp-country']),
				'email' =>  sanitize_email($_POST['lp-email']),
				'address' => sanitize_text_field($_POST['lp-address']),
				'niche' => sanitize_text_field($_POST['lp-niche']),
				
				);
update_option('lp_general',$lp_general);
?>
	<div id="message" class="updated">
    	<p>Settings saved.</p>
    </div>
<?php
	  endif;
	  
	  $checked = 'checked="checked"'; $selected = 'selected="selected"';
	  $lp_general = get_option('lp_general');
?>
<?php global $wpgattack;?>
<div class="postbox ">

	<h3 class="hndle"  style="cursor:pointer; padding:7px 10px; font-size:20px;"> General Settings </h3>
  <table><tr>
   <td style="width:65%">
    <div id="lp_admin_generalid">
    
    <form name="glegal" method="post" action="" enctype="">
    	<table cellpadding="0" cellspacing="0" border="0">
        	<tr>
            	<td></td><td></td><td><b>Shortcodes</b></td>
            </tr>
        	<tr>
            	<td><b>Domain Name:</b></td><td><input type="text" name="lp-domain-name" value="<?php echo !empty($lp_general['domain'])?$lp_general['domain']:get_bloginfo('url');?>" /></td><td>[Domain]</td>
            </tr>
            <tr>
            	<td><b>Business Name:</b></td><td><input type="text" name="lp-business-name" value="<?php echo !empty($lp_general['business'])? stripslashes($lp_general['business']):'';?>" /></td><td>[Business Name]</td>
            </tr>
            <tr>
            	<td><b>Phone:</b></td><td><input type="text" name="lp-phone" value="<?php echo !empty($lp_general['phone']) ? $lp_general['phone']:'';?>" /></td><td>[Phone]</td>
            </tr>
            <tr>
            	<td><b>Street:</b></td><td><input type="text" name="lp-street" value="<?php echo !empty($lp_general['street'])? $lp_general['street']:'';?>" /></td><td>[Street]</td>
            </tr>
            <tr>
            	<td><b>City, State, Zip code:</b></td><td><input type="text" name="lp-city-state" value="<?php echo !empty($lp_general['cityState'])? stripslashes($lp_general['cityState']):'';?>" /></td><td>[City, State, Zip code]</td>
            </tr>
            <tr>
            	<td><b>Country:</b></td><td><input type="text" name="lp-country" value="<?php echo !empty($lp_general['country'])? $lp_general['country']:'';?>" /></td><td>[Country]</td>
            </tr>
            <tr>
            	<td><b>Email:</b></td><td><input type="text" name="lp-email" value="<?php echo !empty($lp_general['email'])?$lp_general['email']:get_option('admin_email');?>" /></td><td>[Email]</td>
            </tr>
            <tr>
            	<td><b>Address:</b></td><td><input type="text" name="lp-address" value="<?php echo !empty($lp_general['address'])?stripslashes($lp_general['address']):'';?>" /></td><td>[Address]</td>
            </tr>
            <tr>
            	<td><b>Niche:</b></td><td><input type="text" name="lp-niche" value="<?php echo !empty($lp_general['niche'])? stripslashes($lp_general['niche']):'';?>" /></td><td>[Niche]</td>
            </tr>
               
        </table>
      
        
        <p> <input type="submit" name="lp-gsubmit" value="Save" /><input type="submit" name="lp-greset" value="Reset" /></p>
        </form>
         
    </div>
    </td><td style="width:35%"><a href="http://club.wpeka.com/plugins/" target="_blank"><img src="<?php echo plugins_url( 'legal-pages/wpeka.png' )?>"></a>
   
    </td>
    </tr></table>
</div>
	<a href="<?php echo esc_url($baseurl);?>?page=lp-create"><h3 class="hndle"  style="cursor:pointer; padding:7px 10px; font-size:20px;">Click Here to Create Legal Pages &raquo;</h3></a>
<?php }else{
	?>
    <h2>DISCLAIMER</h2>
   <form action="" method="post">
   <textarea rows="20" cols="130">WPLegalPages.com ("Site") and the documents or pages that it may provide, are provided on the condition that you accept these terms, and any other terms or disclaimers that we may provide.  You may not use or post any of the templates or legal documents until and unless you agreed.  We are not licensed attorneys and do not purport to be. 

WPLegalPages.com is not a law firm, is not comprised of a law firm, and its employees are not lawyers.  We do not review your site and we will not review your site. We do not purport to act as your attorney and do not make any claims that would constitute legal advice. We do not practice law in any state, nor are any of the documents provided via our Site intended to be in lieu of receiving legal advice.  The information we may provide is general in nature, and may be different in your jurisdiction.  In other words, do not take these documents to be "bulletproof" or to give you protection from lawsuits.  They are not a substitute for legal advice and you should have an attorney review them.  

Accordingly, we disclaim any and all liability and make no warranties, including disclaimer of warranty for implied purpose, merchantability, or fitness for a particular purpose.  We provide these documents on an as is basis, and offer no express or implied warranties.  The use of our plugin and its related documents is not intended to create any representation or approval of the legality of your site and you may not represent it as such.  We will have no responsibility or liability for any claim of loss, injury, or damages related to your use or reliance on these documents, or any third parties use or reliance on these documents.  They are to be used at your own risk.  Your only remedy for any loss or dissatisfaction with WPLegalPages is to discontinue your use of the service and remove any documents you may have downloaded.  

To the degree that we have had a licensed attorney review these documents it is for our own internal purposes and you may not rely on this as legal advice.  Since the law is different in every state, you should have these documents reviewed by an attorney in your jurisdiction.  As stated below, we disclaim any and all liability and warranties, including damages or loss that may result from your use or misuse of the documents.  Unless prohibited or limited by law, our damages in any matter are limited to the amount you paid for the WPLegalPages plugin.  Any disputes must be brought in the State of Florida and subject to a one-year statute of limitations from when the cause of action occurred.  The prevailing party in any action or dispute is entitled to attorneys' fees and costs.</textarea><br/><br/>
    Please Tick this checkbox to accept our Terms and Policy <input type="checkbox" name="lp_accept_terms" value="1" <?php if($lpterms==1)echo "checked";?>  onclick="jQuery('#lp_submit').toggle();"/>
    <br/><br/><input type="submit" name="lp_submit" id="lp_submit" style="display:none;" value="Accept" />
    </form>
<?php 
}?>


