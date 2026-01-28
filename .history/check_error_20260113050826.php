<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check PHP version
echo "<h2>Z-STUDIO System Check</h2>";
echo "<div style='background: #f8fafc; padding: 20px; border-radius: 12px; font-family: monospace;'>";

echo "<h3>📋 PHP Environment</h3>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Server: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

echo "<h3>🗄️ Database Connection</h3>";
try {
    $conn = mysqli_connect('localhost', 'root', '', 'db_client_brief');
    if ($conn) {
        echo "✅ Database connection successful<br>";
        
        // Check table
        $result = mysqli_query($conn, "SHOW TABLES LIKE 'tb_projek'");
        if (mysqli_num_rows($result) > 0) {
            echo "✅ Table 'tb_projek' exists<br>";
            
            // Check table structure
            $desc = mysqli_query($conn, "DESCRIBE tb_projek");
            echo "<details><summary>Table Structure:</summary>";
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
            while ($row = mysqli_fetch_assoc($desc)) {
                echo "<tr>";
                echo "<td>" . $row['Field'] . "</td>";
                echo "<td>" . $row['Type'] . "</td>";
                echo "<td>" . $row['Null'] . "</td>";
                echo "<td>" . $row['Key'] . "</td>";
                echo "<td>" . $row['Default'] . "</td>";
                echo "<td>" . $row['Extra'] . "</td>";
                echo "</tr>";
            }
            echo "</table></details>";
            
            // Check data count
            $count = mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_projek");
            $total = mysqli_fetch_assoc($count)['total'];
            echo "Total records: " . $total . "<br>";
        } else {
            echo "❌ Table 'tb_projek' NOT found<br>";
        }
        
        mysqli_close($conn);
    } else {
        echo "❌ Database connection failed: " . mysqli_connect_error() . "<br>";
    }
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "<br>";
}

echo "<h3>📁 File & Directory Permissions</h3>";
$files = [
    'index.php',
    'includes/koneksi.php',
    'simpan_brief.php',
    'uploads/',
    'admin/index.php',
    'assets/css/style.css'
];

foreach ($files as $file) {
    if (file_exists($file)) {
        echo "✅ " . $file . " exists<br>";
        echo "&nbsp;&nbsp;&nbsp;Permission: " . substr(sprintf('%o', fileperms($file)), -4) . "<br>";
        echo "&nbsp;&nbsp;&nbsp;Size: " . (is_file($file) ? filesize($file) . " bytes" : "Directory") . "<br>";
    } else {
        echo "❌ " . $file . " NOT found<br>";
    }
}

echo "<h3>🔧 PHP Extensions</h3>";
$extensions = ['mysqli', 'pdo_mysql', 'gd', 'mbstring', 'json', 'zip'];
foreach ($extensions as $ext) {
    echo extension_loaded($ext) ? "✅ " : "❌ ";
    echo $ext . " extension<br>";
}

echo "<h3>⚙️ Server Configuration</h3>";
echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "<br>";
echo "post_max_size: " . ini_get('post_max_size') . "<br>";
echo "max_execution_time: " . ini_get('max_execution_time') . "<br>";
echo "memory_limit: " . ini_get('memory_limit') . "<br>";

echo "<h3>🌐 Session Status</h3>";
echo "Session Status: " . session_status() . "<br>";
echo "Session Name: " . session_name() . "<br>";

echo "<h3>✅ Test Form Submission</h3>";
echo "<form method='POST' action='simpan_brief.php' enctype='multipart/form-data' style='background: #e2e8f0; padding: 20px; border-radius: 8px;'>";
echo "<input type='text' name='nama' placeholder='Nama' required><br>";
echo "<input type='email' name='email' placeholder='Email' required><br>";
echo "<input type='text' name='telepon' placeholder='Telepon' required><br>";
echo "<select name='jasa'><option value='SEO Optimization'>SEO</option></select><br>";
echo "<textarea name='pesan' placeholder='Pesan' required></textarea><br>";
echo "<input type='file' name='file_brief'><br>";
echo "<button type='submit' name='submit'>Test Submit</button>";
echo "</form>";

echo "</div>";
?>