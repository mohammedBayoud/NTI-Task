<?php
define('DB_HOST', 'localhost'); 
define('DB_USER', 'root');
define('DB_PASS', 't'); 
define('DB_NAME', 'training_system');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

try {
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if (!$con) {
        throw new Exception(" Error: " . mysqli_connect_error());
    }
    
    mysqli_set_charset($con, "utf8");
    
} catch (Exception $e) {
    die("حدث خطأ: " . $e->getMessage());
}

ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
