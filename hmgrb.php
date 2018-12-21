<?php
/**
 * Plugin Name: WP Google Reviews
 * Plugin URI: http://hawpmedia.com/
 * Description: Request reviews from your customers with this simple plugin and push only the 5 star reviews through to Google.
 * Version: 1.0.0
 * Author: Hawp Media
 * Author URI: http://hawpmedia.com/
 */

if (!defined('ABSPATH')) exit();

$plugin_data = get_plugin_data(__FILE__);
$plugin_version = $plugin_data['Version'];
define('HMGRB_CURRENT_VERSION', $plugin_version);

define('HMGRB_PATH', plugin_dir_path(__FILE__));
define('HMGRB_URL', plugin_dir_url(__FILE__));

include_once(HMGRB_PATH.'base/admin.php');
$hm_admin_HMGRB = new hm_admin_HMGRB();

include_once(HMGRB_PATH.'modules/form.php');
$hm_form_HMGRB = new hm_form_HMGRB();

include_once(HMGRB_PATH.'modules/reviews.php');
$hm_review_HMGRB = new hm_review_HMGRB();