<?php
// debug.php - Temporary diagnostic file (DELETE after fixing!)
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>PHP Version: " . phpversion() . "</h2>";
echo "<h3>1. Testing session_start()...</h3>";

if (session_start()) {
    echo "<p style='color:green'>session_start() works!</p>";
} else {
    echo "<p style='color:red'>session_start() FAILED</p>";
}

echo "<h3>2. Testing MySQL connection...</h3>";
$DB_HOST = 'sql200.infinityfree.com';
$DB_USER = 'if0_42791100';
$DB_PASS = 'RANJITHaI1';
$DB_NAME = 'if0_42791100_smart_chemical_inventory';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($mysqli->connect_errno) {
    echo "<p style='color:red'>MySQL FAILED: " . $mysqli->connect_error . "</p>";
} else {
    echo "<p style='color:green'>MySQL connected OK!</p>";
    $result = $mysqli->query("SELECT username, role FROM users");
    if ($result) {
        echo "<p>Users in DB:</p><ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row['username']) . " - " . htmlspecialchars($row['role']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p style='color:red'>Query FAILED: " . $mysqli->error . "</p>";
    }
}

echo "<h3>3. mysqlnd check...</h3>";
if (function_exists('mysqli_fetch_all')) {
    echo "<p>mysqlnd AVAILABLE</p>";
} else {
    echo "<p>mysqlnd NOT available</p>";
}

echo "<p><strong>DELETE this file after debugging!</strong></p>";
?>
