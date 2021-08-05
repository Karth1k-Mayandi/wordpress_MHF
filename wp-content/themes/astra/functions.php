<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '3.2.0' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );


/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '3.1.0' );

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-update.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-pb-compatibility.php';


/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';
/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

if ( is_admin() ) {

	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/notices/class-astra-notices.php';

	/**
	 * Metabox additions.
	 */
	require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';
}

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';


/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';


/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymus functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';
 
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
	/*	add_menu_page('Customer Request View', 'Contact Us', 'manage_options', 'myplugin/View_Customer_Details.php', 'customerview_admin_page', 'dashicons-tag', 6  );
		add_submenu_page('Customer Request View', 'Contact Us', 'manage_options', 'myplugin/View_Customer_Details.php', 'customerview_admin_page', 'dashicons-tag', 6  );*/
		add_menu_page('Members', 'Form Data', 'manage_options', 'members-slug', 'members_function', 'dashicons-tag', 6);
        add_submenu_page( 'members-slug', 'Add Members', 'Contact us', 'manage_options', 'myplugin/View_Contact_Details.php', 'customerview_admin_page');
        add_submenu_page( 'members-slug', 'Add Members', 'Volunteer', 'manage_options', 'myplugin/View_Volunteer_Details.php', 'customerview_admin1_page');
        add_submenu_page( 'members-slug', 'Add Members', 'Corporate', 'manage_options', 'myplugin/View_Corporater_Details.php', 'customerview_admin2_page');
        add_submenu_page( 'members-slug', 'Add Members', 'Careers', 'manage_options', 'myplugin/View_Careers_Details.php', 'customerview_admin3_page');

	}
 


	
	function customerview_admin_page(){
	?>
	<div class="wrap">
		<h2>Contact Us details</h2>
		<?php
		global $wpdb;
		$customers = $wpdb->get_results("SELECT * FROM contact_form_info ORDER BY ID ASC;");
		echo "<table class='widefat fixed'>";
		echo "<th>id</th>";
		echo "<th>name</th>";
		echo "<th>email</th>";
		echo "<th>code</th>";
		echo "<th>Phone No</th>";
		echo "<th>inquery</th>";
		echo "<th>message</th>";
		echo "<th>created_at</th>";
	
		foreach($customers as $customer){
			echo "<tr>";
			echo "<td><input type='text' name='id' value=".$customer->id." size='1' readonly></input></td>";
			$CusID = $customer->id;
			echo "<td>".$customer->name."</td>";
			echo "<td>".$customer->email."</td>";
			echo "<td>".$customer->code."</td>";
			echo "<td>".$customer->subject."</td>";
			echo "<td>".$customer->inquery."</td>";
			echo "<td>".$customer->message."</td>";
			echo "<td>".$customer->created_at."</td>";
		
			echo "</tr>";
		}
		echo "</table>";
		?>
	</div>
	<?php
	}
	
	function customerview_admin1_page(){
	?>
	<div class="wrap">
		<h2>Volunteers details</h2>
		<?php
		global $wpdb;
		$customers = $wpdb->get_results("SELECT * FROM volunteers ORDER BY ID ASC;");
		echo "<table class='widefat fixed'>";
		echo "<th>id</th>";
		echo "<th>First Name</th>";
		echo "<th>Last Name</th>";
		echo "<th>email</th>";
		echo "<th>code</th>";
		echo "<th>Phone No</th>";
		echo "<th>Company</th>";
		echo "<th>message</th>";
		echo "<th>created_at</th>";
	
		foreach($customers as $customer){
			echo "<tr>";
			echo "<td><input type='text' name='id' value=".$customer->id." size='1' readonly></input></td>";
			$CusID = $customer->id;
			echo "<td>".$customer->name."</td>";
			echo "<td>".$customer->lname."</td>";
			echo "<td>".$customer->email."</td>";
			echo "<td>".$customer->code."</td>";
			echo "<td>".$customer->phone."</td>";
			echo "<td>".$customer->company."</td>";
			echo "<td>".$customer->message."</td>";
			echo "<td>".$customer->created_at."</td>";
		
			echo "</tr>";
		}
		echo "</table>";
		?>
	</div>
	<?php
	}
	
function customerview_admin2_page(){
	?>
	<div class="wrap">
		<h2>Corporate details</h2>
		<?php
		global $wpdb;
		$customers = $wpdb->get_results("SELECT * FROM corporate_partners ORDER BY ID ASC;");
		echo "<table class='widefat fixed'>";
		echo "<th>id</th>";
		echo "<th>First Name</th>";
		echo "<th>Last Name</th>";
		echo "<th>email</th>";
		echo "<th>code</th>";
		echo "<th>Phone No</th>";
		echo "<th>Company</th>";
		echo "<th>message</th>";
		echo "<th>created_at</th>";
	
		foreach($customers as $customer){
			echo "<tr>";
			echo "<td><input type='text' name='id' value=".$customer->id." size='1' readonly></input></td>";
			$CusID = $customer->id;
			echo "<td>".$customer->name."</td>";
			echo "<td>".$customer->lname."</td>";
			echo "<td>".$customer->email."</td>";
			echo "<td>".$customer->code."</td>";
			echo "<td>".$customer->phone."</td>";
			echo "<td>".$customer->company."</td>";
			echo "<td>".$customer->message."</td>";
			echo "<td>".$customer->created_at."</td>";
		
			echo "</tr>";
		}
		echo "</table>";
		?>
	</div>
	<?php
	}	


function customerview_admin3_page(){
	?>
	<div class="wrap">
		<h2>Careers details</h2>
		<?php
		global $wpdb;
		$customers = $wpdb->get_results("SELECT * FROM contactus ORDER BY ID ASC;");
		echo "<table class='widefat fixed'>";
		echo "<th>id</th>";
		echo "<th>Name</th>";
		echo "<th>email</th>";
		echo "<th>Phone No</th>";
		echo "<th>File</th>";
		echo "<th>message</th>";
		echo "<th>created_at</th>";
	
		foreach($customers as $customer){
			echo "<tr>";
			echo "<td><input type='text' name='id' value=".$customer->id." size='1' readonly></input></td>";
			$CusID = $customer->id;
			echo "<td>".$customer->name."</td>";
			echo "<td>".$customer->email."</td>";
			echo "<td>".$customer->subject."</td>";
			echo "<td>".$customer->attachement."</td>";
			echo "<td>".$customer->message."</td>";
			echo "<td>".$customer->created_at."</td>";
		
			echo "</tr>";
		}
		echo "</table>";
		?>
	</div>
	<?php
	}
	
function custom_excerpt_length( $length ) {
	return 500;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );