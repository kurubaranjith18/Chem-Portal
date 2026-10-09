<?php
// db_config.php - InfinityFree MySQL credentials
$DB_HOST = 'sql200.infinityfree.com';
$DB_USER = 'if0_42791100';
$DB_PASS = 'RANJITHaI1';
$DB_NAME = 'if0_42791100_smart_chemical_inventory';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($mysqli->connect_errno) {
    die('Database connection failed: ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');
