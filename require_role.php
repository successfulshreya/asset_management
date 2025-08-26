<?php
function require_role($roles = []){
    if(!isset($_SESSION)){
        session_start();
    }
    $current = $_SESSION['role'] ?? 'employee';
    if(!in_array($current, $roles)){
        http_response_code(403);
        echo 'Access denied';
        exit;
    }
}
?>