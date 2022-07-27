<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Wordpress_Webmail_Access
 * @subpackage Wordpress_Webmail_Access/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wordpress_Webmail_Access
 * @subpackage Wordpress_Webmail_Access/public
 * @author     Your Name <email@example.com>
 */
class Wordpress_Webmail_Access_Public {
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $wordpress_webmail_access    The ID of this plugin.
     */
    private $wordpress_webmail_access;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $wordpress_webmail_access       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($wordpress_webmail_access, $version) {
        $this->wordpress_webmail_access = $wordpress_webmail_access;
        $this->version = $version;
    }

    public function shortcode_webmail_form() {
        $buildDir = __DIR__ . '/build';

        $cssFiles = scandir("$buildDir/css");
        $jsFiles = scandir("$buildDir/js");
        $buildFiles = array_merge($cssFiles, $jsFiles);

        $files = array_filter($buildFiles, function ($file) {
            return $file !== '.' && $file !== '..';
        });

        $pathsJs = '';
        $pathsCss = '';

        foreach ($files as $file) {
            $posDotBeforeExt = strripos($file, '.');
            $fileExt = substr($file, $posDotBeforeExt + 1);

            switch ($fileExt) {
                case 'js':
                    $path = plugin_dir_url(__FILE__) . "build/js/$file";
                    $pathsJs .= "<script src='$path'></script>";

                    break;
                case 'css':
                    $path = plugin_dir_url(__FILE__) . "build/css/$file";
                    $pathsCss .= "<link rel='stylesheet' href='$path'>";

                    break;
            }
        }

        $iframeFilePath = plugin_dir_path(__FILE__) . 'build/iframe.html';
        $iframeFilePathUrl = plugin_dir_url(__FILE__) . 'build/iframe.html';

        if (!file_exists($iframeFilePath)) {
            $iframeCode = <<<EOT
        <!DOCTYPE html>
        <html>
            <head>
                $pathsCss
            </head>
            <body>
                <div id=q-app></div>
                $pathsJs
            </body>
        </html>
        EOT;

            file_put_contents($iframeFilePath, $iframeCode);
        }

        return <<<EOT
        <iframe 
        src="$iframeFilePathUrl"
        frameborder="0"
        loading="eager"
        allowfullscreen="false"
        style="width: 400px; height: 141.72px;"
        ></iframe>
        EOT;
    }
}
