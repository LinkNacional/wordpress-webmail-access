<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/LinkNacional/wordpress-webmail-access
 * @since             1.0.0
 * @package           Wordpress_Webmail_Access
 *
 * @wordpress-plugin
 * Plugin Name:       Wordpress Webmail Access
 * Plugin URI:        https://github.com/LinkNacional/wordpress-webmail-access
 * Description:       Forneçe um formulário para acessar webmail via endereço de e-mail.
 * Version:           1.0.4
 * Author:            Link Nacional
 * Author URI:        https://www.linknacional.com.br/
 * License:           GPL-2.0+
 * License URI:
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('WORDPRESS_WEBMAIL_ACCESS_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wordpress-webmail-access-activator.php
 */
function activate_wordpress_webmail_access() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-wordpress-webmail-access-activator.php';
    Wordpress_Webmail_Access_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wordpress-webmail-access-deactivator.php
 */
function deactivate_wordpress_webmail_access() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-wordpress-webmail-access-deactivator.php';
    Wordpress_Webmail_Access_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_wordpress_webmail_access');
register_deactivation_hook(__FILE__, 'deactivate_wordpress_webmail_access');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-wordpress-webmail-access.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wordpress_webmail_access() {
    $plugin = new Wordpress_Webmail_Access();
    $plugin->run();
}
run_wordpress_webmail_access();
