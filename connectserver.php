<?php
/*เชื่อม database*/
define('DB_SERVER', '163.44.198.42'); // Your hostname
define('DB_USER', 'cp528282_Admin'); // Database Username
define('DB_PASS', 'Admin_TSK_369'); // Database Password
define('DB_NAME', 'cp528282_Data'); // Database Name
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$db = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if ($conn->connect_error) {
    die("Something wrong.: " . $conn->connect_error);
}
/*---------------แก้ปัญหา php เรียกภาษาไทยออกมากลายเป็นภาษาต่างดาว------------------*/
mysqli_query($conn, "set character set utf8");
/*------------------------------------------------------------------------------*/
?>