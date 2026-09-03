<?php
// db_config.php
// Uses Railway MySQL env vars in production, falls back to XAMPP locally

$DB_HOST = getenv('MYSQLHOST')     ?: 'localhost';
$DB_USER = getenv('MYSQLUSER')     ?: 'root';
$DB_PASS = getenv('MYSQLPASSWORD') ?: '';
$DB_NAME = getenv('MYSQLDATABASE') ?: 'smart_chemical_inventory';
$DB_PORT = getenv('MYSQLPORT')     ?: '3306';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, (int)$DB_PORT);

if ($mysqli->connect_errno) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

$mysqli->set_charset('utf8mb4');
