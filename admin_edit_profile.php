<?php
include 'connect_server.php';

$id_user = $_POST['id_user'];
$name_user = $_POST['name_user'];
$surname_user = $_POST['surname_user'];
$nickname_user = $_POST['nickname_user'];
$sex_user = $_POST['sex_user'];

$editdata = "UPDATE `user` SET `user_name`='$name_user',`user_surname`='$surname_user',`user_nickname`='$nickname_user',`user_sex`='$sex_user' WHERE `ID_user`='$id_user'";


if($conn->query($editdata)){
    echo '<script type ="text/JavaScript">';
    echo 'alert("บันทึกการแก้ไขข้อมูลสำเร็จ")';
    echo '</script>';
}else{
    echo '<script type ="text/JavaScript">';
    echo 'alert("บันทึกการแก้ไขข้อมูลไม่สำเร็จ(ใส่ข้อมูลให้ครบด้วยพี่ ถ้าไม่ได้ยังไงติดต่อฝ่ายเทคนิค)")';
    echo '</script>';
}

echo '<meta http-equiv= "refresh" content="0; URL=profile_setting_for_admin">';

mysqli_close($conn);

?>