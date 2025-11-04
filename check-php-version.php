<?php
/**
 * PHP Version and Extension Checker for WordPress
 * This file helps diagnose the MySQL extension issue
 */

// Check PHP version
$phpVersion = phpversion();
echo "<h2>PHP Version Information</h2>";
echo "<p><strong>Current PHP Version:</strong> " . $phpVersion . "</p>";

// Check if mysqli extension is loaded
if (extension_loaded('mysqli')) {
    echo "<p style='color: green;'><strong>✓ mysqli extension is LOADED</strong></p>";
    echo "<p><strong>MySQLi Client Library Version:</strong> " . mysqli_get_client_info() . "</p>";
} else {
    echo "<p style='color: red;'><strong>✗ mysqli extension is NOT LOADED</strong></p>";
}

// Check if pdo_mysql extension is loaded
if (extension_loaded('pdo_mysql')) {
    echo "<p style='color: green;'><strong>✓ pdo_mysql extension is LOADED</strong></p>";
} else {
    echo "<p style='color: orange;'><strong>⚠ pdo_mysql extension is NOT LOADED (optional but recommended)</strong></p>";
}

// Check if old mysql extension is loaded (deprecated)
if (extension_loaded('mysql')) {
    echo "<p style='color: orange;'><strong>⚠ Old mysql extension is loaded (deprecated in PHP 7.0+)</strong></p>";
}

// Check WordPress version
if (defined('WP_VERSION')) {
    echo "<h2>WordPress Version</h2>";
    echo "<p><strong>WordPress Version:</strong> " . WP_VERSION . "</p>";
    
    // Check if WordPress version is too old
    $wpVersion = explode('.', WP_VERSION);
    $majorVersion = (int)$wpVersion[0];
    $minorVersion = (int)$wpVersion[1];
    
    if ($majorVersion < 4 || ($majorVersion == 3 && $minorVersion < 9)) {
        echo "<p style='color: red;'><strong>⚠ WARNING: WordPress version is too old (3.9 or lower)</strong></p>";
        echo "<p>This version is incompatible with PHP 7.0+. You need to update WordPress.</p>";
    } elseif ($majorVersion < 6) {
        echo "<p style='color: orange;'><strong>⚠ WordPress version is outdated. Consider updating to the latest version.</strong></p>";
    } else {
        echo "<p style='color: green;'><strong>✓ WordPress version is modern</strong></p>";
    }
}

// PHP version compatibility check
echo "<h2>Compatibility Check</h2>";
$phpMajor = (int)explode('.', $phpVersion)[0];
$phpMinor = (int)explode('.', $phpVersion)[1];

if ($phpMajor < 5 || ($phpMajor == 5 && $phpMinor < 6)) {
    echo "<p style='color: red;'><strong>✗ PHP version is too old (below 5.6)</strong></p>";
    echo "<p>WordPress requires PHP 5.6 or higher. Please upgrade PHP.</p>";
} elseif ($phpMajor == 5 && $phpMinor == 6) {
    echo "<p style='color: orange;'><strong>⚠ PHP 5.6 is the minimum version but is outdated</strong></p>";
    echo "<p>WordPress recommends PHP 7.4 or higher. Please upgrade PHP.</p>";
} elseif ($phpMajor == 7) {
    echo "<p style='color: green;'><strong>✓ PHP 7.x is compatible</strong></p>";
    if (!extension_loaded('mysqli')) {
        echo "<p style='color: red;'><strong>But mysqli extension must be enabled!</strong></p>";
    }
} elseif ($phpMajor >= 8) {
    echo "<p style='color: green;'><strong>✓ PHP 8.x is compatible</strong></p>";
    if (!extension_loaded('mysqli')) {
        echo "<p style='color: red;'><strong>But mysqli extension must be enabled!</strong></p>";
    }
}

// Show loaded extensions
echo "<h2>Loaded Extensions</h2>";
$extensions = get_loaded_extensions();
$mysqlExtensions = array_filter($extensions, function($ext) {
    return stripos($ext, 'mysql') !== false;
});

if (empty($mysqlExtensions)) {
    echo "<p style='color: red;'><strong>No MySQL-related extensions found!</strong></p>";
} else {
    echo "<ul>";
    foreach ($mysqlExtensions as $ext) {
        echo "<li>$ext</li>";
    }
    echo "</ul>";
}

// Show php.ini location
echo "<h2>Configuration</h2>";
echo "<p><strong>php.ini location:</strong> " . php_ini_loaded_file() . "</p>";
echo "<p><strong>Additional .ini files:</strong> " . php_ini_scanned_files() . "</p>";

// Show extension directory
if (ini_get('extension_dir')) {
    echo "<p><strong>Extension directory:</strong> " . ini_get('extension_dir') . "</p>";
}

phpinfo();
?>

