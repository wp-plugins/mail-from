<?php
/*
Plugin Name: Mail From 
Plugin URI: http://labs.saruken.com
Description: Change the default wordpress@yourdomain.tld email address that WordPress sends it's email from.
Author: Andrew Hamilton
Version: 0.1
Author URI: http://andrewhamilton.net/
Licensed under the The GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html
*/

//----------------------------------------------------------------------------
//		SETUP FUNCTIONS
//----------------------------------------------------------------------------

$mail_from_opt = get_option('mail_from_options');

function mail_from_add_options_page() {
    if (function_exists('add_options_page')) {
						add_options_page('Mail From', 'Mail From', 8, basename(__FILE__), 'mail_from_options_page');
    }
} 

//----------------------------------------------------------------------------
//		MAIN FUNCTION
//----------------------------------------------------------------------------

function mail_from() 
{

global $mail_from_opt;

	$username = $mail_from_opt['username'];
	$domainname = $mail_from_opt['domainname'];
	
	$emailaddress = $username.'@'.$domainname;
	
	return $emailaddress;
}

//----------------------------------------------------------------------------
//		ADMIN OPTION PAGE FUNCTIONS
//----------------------------------------------------------------------------

function mail_from_options_page()
{

global $wpdb;

	$domain = preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));

	// Setup Default Options Array
		$optionarray_def = array(
			'username' => 'noreply',
			'domainname' => $domain
		);
		add_option('mail_from_options', $optionarray_def, 'Mail From Wordpress Plugin Options');

		if (isset($_POST['submit']) ) {
			
	// Options Array Update
		$optionarray_update = array (
			'username' => $_POST['username'],
			'domainname' => $_POST['domainname']
		);
		
		update_option('mail_from_options', $optionarray_update);
		}
		
	// Get Options
		$optionarray_def = get_option('mail_from_options');

?>
	<div class="wrap">
	<h2>Mail From Options</h2>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?page=' . basename(__FILE__); ?>&updated=true">
	<fieldset class="options">
	<p>
	<b>Mail From</b> allows you to change the default email address <em>(wordpress@<?php echo $domain;?>)</em> that WordPress sends it's mail from.
	</p>
	<table width="100%" cellspacing="2" cellpadding="5" class="editform">
		<tr valign="center"> 
			<th width="150px" scope="row">Username </th> 
			<td width="15px"><input type="text" id="username_inp" name="username" value="<?php echo $optionarray_def['username']; ?>" size="25" /></td>
			<td><span style="color: #555; font-size: .85em;">Username part of the email address e.g. <b>username</b>@yourdomain.tld</span></td> 
		</tr>
		<tr valign="center"> 
			<th width="150px" scope="row">Domain Name </th> 
			<td width="15px"><input type="text" id="domainname_inp" name="domainname" value="<?php echo $optionarray_def['domainname']; ?>" size="25" /></td>
			<td><span style="color: #555; font-size: .85em;">Domain name part of the email address e.g. username@<b>yourdomain.tld</b></span></td> 
		</tr>
	</table>
	</fieldset>
	<p />
	<div class="submit">
		<input type="submit" name="submit" value="<?php _e('Update Options') ?> &raquo;" />
	</div>
	</form>
<?php
}

//----------------------------------------------------------------------------
//		WORDPRESS FILTERS AND ACTIONS
//----------------------------------------------------------------------------

add_filter('wp_mail_from','mail_from');
add_action('admin_menu', 'mail_from_add_options_page');

?>