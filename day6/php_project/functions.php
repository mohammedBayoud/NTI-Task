<?php
require_once 'config.php';

function check_login($username, $password) {
    global $USERS;
    return isset($USERS[$username]) && $USERS[$username] === $password;
}

function log_login($username, $status) {
    $file = __DIR__ . '/logs/login_log.csv' ;
    $date = date('Y-m-d H:i:s');
    $row = [$date, $username, $status];
    $fp = fopen($file, 'a');
    fputcsv($fp, $row);
    fclose($fp);
}

function log_upload($username, $type, $path, $mime) {
    $file = __DIR__ . '/logs/upload_log.csv';
    $date = date('Y-m-d H:i:s');
    $row = [$date, $username, $type, $path, $mime];
    $fp = fopen($file, 'a');
    fputcsv($fp, $row);
    fclose($fp);
}

function require_login() {
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }
}
?> 
