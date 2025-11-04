<?php
/**
 * GamesMania Theme Functions
 */

if (!function_exists('get_theme_option')) {
    /**
     * Get theme option value
     * 
     * @param string $option_name The name of the option to retrieve
     * @param mixed $default_value Optional default value if option doesn't exist
     * @return mixed The option value or default value
     */
    function get_theme_option($option_name, $default_value = '') {
        // Use WordPress theme mods (recommended for theme options)
        $value = get_theme_mod($option_name);
        
        // If not found in theme mods, try options table with theme prefix
        if ($value === false) {
            $value = get_option('gamesmania_' . $option_name, $default_value);
        }
        
        // If still not found, try without prefix
        if ($value === false) {
            $value = get_option($option_name, $default_value);
        }
        
        return $value !== false ? $value : $default_value;
    }
}

/**
 * Get sidebars - includes the sidebar template
 */
if (!function_exists('get_sidebars')) {
    function get_sidebars() {
        get_sidebar();
    }
}

/**
 * Get current page URL
 */
if (!function_exists('curPageURL')) {
    function curPageURL() {
        $pageURL = 'http';
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
}

/**
 * Display 125x125 sidebar ads
 */
if (!function_exists('sidebar_ads_125')) {
    function sidebar_ads_125() {
        $ads_125 = get_theme_option('ads_125');
        if ($ads_125 != '') {
            // Parse the ads (could be HTML or comma-separated)
            echo '<div class="ads-125">';
            echo $ads_125;
            echo '</div>';
        }
    }
}

/**
 * Add theme support for various WordPress features
 */
function gamesmania_setup() {
    // Add theme support for post thumbnails
    if (function_exists('add_theme_support')) {
        add_theme_support('post-thumbnails');
    }
    
    // Add theme support for automatic feed links
    add_theme_support('automatic-feed-links');
}
add_action('after_setup_theme', 'gamesmania_setup');

