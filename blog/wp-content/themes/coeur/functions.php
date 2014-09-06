<?php

// Coeur Includes
require_once locate_template('/framework/options.php');
require_once locate_template('/framework/scripts.php');
require_once locate_template('/framework/general.php');
require_once locate_template('comments.php');
require_once locate_template('/framework/wp_bootstrap_navwalker.php');

function coeur_admin_notice() {
	global $pagenow;
	if (( $pagenow == 'themes.php') or ( $pagenow == 'theme-editor.php') or ( $pagenow == 'widgets.php') or ( $pagenow == 'nav-menus.php') ){ ?>
	<div class="updated">
		<p><?php _e( '<p><b>Hi there!</b></p> If you like this theme please consider making a donation to its developer. This theme is free for all except for its creator as it involves some developing costs. Help me make this theme even better, all donations will only serve one purpose — improve this theme in many possible ways, such as adding features, adding options and improving the design.<p>Thanks for your support. Cheers!</p>', 'coeur' ); ?><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="ZDHZYC4BKD7HE">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
	</form>

</p>
</div>
<?php }
}
add_action( 'admin_notices', 'coeur_admin_notice' );