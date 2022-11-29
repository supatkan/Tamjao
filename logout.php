<?php
    session_start();
   
    // ลบ session id ในคุก กี้เครื่องผู้ใช้
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
    );
    session_destroy(); // ทำลาย session
    header("location: index");

?>
