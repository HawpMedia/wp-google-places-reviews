<?php
/**
 * WP Google Reviews
 * Version 1.0.0
 */

if (!defined('ABSPATH')) exit();

class hm_admin_HMGRB {

	public function __construct() {
		if (is_admin()) {
			add_action('admin_menu', array($this, 'add_plugin_menu'));
			add_action('admin_init', array($this, 'register_settings'));
			add_action('admin_enqueue_scripts', array($this, 'admin_scripts_styles'));
		}
	}

	public function add_plugin_menu() {
		add_menu_page(
			'Google Reviews',
			'Google Reviews',
			'manage_options',
			'hawp_wp-google-reviews',
			array($this, 'add_settings_page'),
			'dashicons-star-filled'
		);
	}

	public function register_settings() {
		register_setting('hm5sr_settings-group', 'hm5sr_google_api_key');
		register_setting('hm5sr_settings-group', 'hm5sr_failtitle');
		register_setting('hm5sr_settings-group', 'hm5sr_faildescription');
		register_setting('hm5sr_settings-group', 'hm5sr_successtitle');
		register_setting('hm5sr_settings-group', 'hm5sr_successdescription');
		register_setting('hm5sr_settings-group', 'hm5sr_introtitle');
		register_setting('hm5sr_settings-group', 'hm5sr_introdescription');
	}

	public function admin_scripts_styles() {
		wp_enqueue_style('hmp-admin-style', HMGRB_URL.'assets/css/admin-style.css');
		wp_enqueue_script('hmp-admin-script', HMGRB_URL.'assets/js/admin-script.js', array('jquery'));
	}

	public function add_settings_page() { ?>
		<div id="hmp_wrap">
			<div id="hmp_body">

				<header id="hmp_header">
					<div class="hmp_header-logo">
						<img src="<?php echo HMGRB_URL.'assets/images/hmp_logo.svg'; ?>" width="163" height="44" alt="Logo Hawp 5 Star Reviews">
						<div class="hmp_name">WP Google Reviews</div>
					</div>
					<div class="hmp_header-nav">
						<span data-tab="hm5sr_general" class="hmp_menuItem show">
							<div class="hmp_menuItem-title">General Settings</div>
							<div class="hmp_menuItem-description">Basic plugin settings</div>
						</span>
						<span data-tab="hm5sr_apiconnection" class="hmp_menuItem">
							<div class="hmp_menuItem-title">Google API</div>
							<div class="hmp_menuItem-description">Google Places API Key</div>
						</span>
						<span data-tab="hm5sr_schema" class="hmp_menuItem">
							<div class="hmp_menuItem-title">SEO Schema</div>
							<div class="hmp_menuItem-description">Improve review visibility</div>
						</span>
						<span data-tab="hm5sr_documentation" class="hmp_menuItem">
							<div class="hmp_menuItem-title">Documentation</div>
							<div class="hmp_menuItem-description">Shortcodes & how-to</div>
						</span>
					</div>
					<div class="hmp_header-footer">
						<p><?php echo 'version '.HMGRB_CURRENT_VERSION; ?></p>
					</div>
				</header>

				<section id="hmp_content">
					<form action="options.php" method="post">

						<div id="hm5sr_general" class="hmp_page show">
							<div class="hmp_section-header">
								<h1><span class="hmp_section-header-icon dashicons dashicons-admin-settings"></span> General Settings</h1>
							</div>
							<?php settings_fields('hm5sr_settings-group'); ?>
							<?php do_settings_sections('hm5sr_settings-group'); ?>
							<h2>Title at Introduction</h2>
							<p>Example: <code>Please Leave Us A Review Below.</code></p>
							<div class="hmp_field-container">
								<input type="text" name="hm5sr_introtitle" value="<?php echo esc_attr(get_option('hm5sr_introtitle')); ?>" />
							</div>

							<h2>Description at Introduction</h2>
							<p>Example: <code>Please check the amount of stars based on your experience.</code></p>
							<div class="hmp_field-container">
								<textarea name="hm5sr_introdescription"><?php echo esc_attr(get_option('hm5sr_introdescription')); ?></textarea>
							</div>

							<h2>Title if User Leaves 5 Star Review</h2>
							<p>Example: <code>Thank You For Leaving A Review!</code></p>
							<div class="hmp_field-container">
								<input type="text" name="hm5sr_successtitle" value="<?php echo esc_attr(get_option('hm5sr_successtitle')); ?>" />
							</div>

							<h2>Description if User Leaves 5 Star Review</h2>
							<p>Example: <code>Would you mind sharing your review on Google?</code></p>
							<div class="hmp_field-container">
								<textarea name="hm5sr_successdescription"><?php echo esc_attr(get_option('hm5sr_successdescription')); ?></textarea>
							</div>

							<h2>Title if User Leaves 4 Star or Less Review</h2>
							<p>Example: <code>Thank You For Leaving A Review!</code></p>
							<div class="hmp_field-container">
								<input type="text" name="hm5sr_failtitle" value="<?php echo esc_attr(get_option('hm5sr_failtitle')); ?>" />
							</div>

							<h2>Description if User Leaves 4 Star or Less Review</h2>
							<p>Example: <code>We are Sorry Your experience wasn't great.</code></p>
							<div class="hmp_field-container">
								<textarea name="hm5sr_faildescription"><?php echo esc_attr(get_option('hm5sr_faildescription')); ?></textarea>
							</div>
						</div>

						<div id="hm5sr_apiconnection" class="hmp_page">
							<div class="hmp_section-header">
								<h1><span class="hmp_section-header-icon dashicons dashicons-admin-multisite"></span> Google API Connection</h1>
							</div>

							<h2>Google PlaceID</h2>
							<p>Get your <a href="https://developers.google.com/places/place-id" target="_blank" title="Click to get your ID">PlaceID</a></p>

							<h2>Google Places API Key</h2>
							<p>Get your <a href="https://console.developers.google.com/cloud-resource-manager" target="_blank" title="Click to get your ID">Google Places API Key</a></p>
							<div class="hmp_field-container">
								<input type="text" name="hm5sr_google_api_key" placeholder="Google Places API Key" value="<?php echo esc_attr(get_option('hm5sr_google_api_key')); ?>" />
							</div>
						</div>

						<div id="hm5sr_schema" class="hmp_page">
							<div class="hmp_section-header">
								<h1><span class="hmp_section-header-icon dashicons dashicons-media-text"></span> SEO Schema</h1>
							</div>

							<h2>Business Details</h2>
							<p>These details are required for your schema markup to generate properly. If all the fields are not filled out, then your schema markup will NOT validate with Google.</p>
							<div class="hmp_field-container">

							</div>
						</div>

						<div id="hm5sr_documentation" class="hmp_page">
							<div class="hmp_section-header">
								<h1><span class="hmp_section-header-icon dashicons dashicons-media-text"></span> Documentation</h1>
							</div>

							<h2>Google Reviews</h2>
							<p>To show your google places listing reviews, please use the shortcode below:</p>
							<div class="hmp_field-container">
								<p><code>[hmgrb_reviews]</code></p>
							</div>

							<h2>Review Lead Form</h2>
							<p>To add the review form to any page, please use the shortcode below:</p>
							<div class="hmp_field-container">
								<p><code>[hmgrb_form]</code></p>
								<p>This shortcode will display a review form on your website. If the user leaves a 5 star review they will be forwarded to your google business page. Any reviews with 4 stars or less will not redirect the user and will not be posted anywhere.</p>
								<p>This is a perfect way to filter out potentially harmful reviews being published on your google profile.</p>
							</div>
						</div>

						<?php submit_button(); ?>
					</form>
				</section>
			</div>
		</div><?php
	}
}