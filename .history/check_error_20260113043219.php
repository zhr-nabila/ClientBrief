<?php
// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Checking PHP Environment...<br>";
echo "PHP Version: " . phpversion() . "<br>";

// Test database connection
echo "<br>Testing Database Connection...<br>";
try {
    $conn = mysqli_connect('localhost', 'root', '', 'db_client_brief');
    if ($conn) {
        echo "✓ Database connection successful<br>";
        
        // Test table
        $result = mysqli_query($conn, "SHOW TABLES LIKE 'tb_projek'");
        if (mysqli_num_rows($result) > 0) {
            echo "✓ Table 'tb_projek' exists<br>";
        } else {
            echo "✗ Table 'tb_projek' NOT found<br>";
        }
        
        mysqli_close($conn);
    } else {
        echo "✗ Database connection failed: " . mysqli_connect_error() . "<br>";
    }
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "<br>";
}

// Test file permissions
echo "<br>Checking File Permissions...<br>";
$files = ['koneksi.php', 'css/style.css', 'js/script.js', 'uploads/'];
foreach ($files as $file) {
    if (file_exists($file)) {
        echo "✓ " . $file . " exists<br>";
        echo "&nbsp;&nbsp;&nbsp;Permission: " . substr(sprintf('%o', fileperms($file)), -4) . "<br>";
    } else {
        echo "✗ " . $file . " NOT found<br>";
    }
}

// Test PHP extensions
echo "<br>Checking PHP Extensions...<br>";
$extensions = ['mysqli', 'pdo_mysql', 'gd', 'mbstring'];
foreach ($extensions as $ext) {
    echo extension_loaded($ext) ? "✓ " : "✗ ";
    echo $ext . " extension<br>";
}

echo "<br>Test Complete!";
?>