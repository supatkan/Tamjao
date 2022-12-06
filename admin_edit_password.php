<?php
include 'connect_server.php';

$id_user = $_POST['id_user'];
$password_user = $new_password;

$editdata = "UPDATE `user` SET `user_password`='$password_user' WHERE `ID_user`='$id_user'";


if($conn->query($editdata)){
    echo '<script type ="text/JavaScript">';
    echo 'alert("บันทึกการแก้ไขรหัสผ่านสำเร็จ")';
    echo '</script>';
}else{
    echo '<script type ="text/JavaScript">';
    echo 'alert("บันทึกการแก้ไขข้อมูลไม่สำเร็จ(ใส่ข้อมูลให้ครบด้วยพี่ ถ้าไม่ได้ยังไงติดต่อฝ่ายเทคนิค)")';
    echo '</script>';
}

echo '<meta http-equiv= "refresh" content="0; URL=account_setting_for_admin">';

mysqli_close($conn);

?>