<?php
/**
 * Disable all plugins temporarily
 * This helps isolate plugin compatibility issues
 */

// Load wp-config
require_once( dirname(__FILE__) . '/wp-config.php' );

// Connect to database
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

// Disable all plugins by setting active_plugins option to empty array
$mysqli->query("UPDATE {$table_prefix}options SET option_value = 'a:0:{}' WHERE option_name = 'active_plugins'");

// Also disable auto-load plugins
$mysqli->query("UPDATE {$table_prefix}options SET option_value = 'a:0:{}' WHERE option_name = 'active_sitewide_plugins'");

echo "All plugins have been disabled. Try accessing your site now.";
$mysqli->close();
?>

