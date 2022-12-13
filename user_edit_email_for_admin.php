<?php
include 'connect_server.php';

$id_user = $_POST['id_user'];
$email_user = $_POST['email_user'];
$tel_user = $_POST['tel_user'];

$editdata = "UPDATE `user` SET `user_email`='$email_user',`user_tel`='$tel_user' WHERE `ID_user`='$id_user'";


if($conn->query($editdata)){
    echo '<script type ="text/JavaScript">';
    echo 'alert("บันทึกการแก้ไขข้อมูลสำเร็จ")';
    echo '</script>';
}else{
    echo '<script type ="text/JavaScript">';
    echo 'alert("บันทึกการแก้ไขข้อมูลไม่สำเร็จ(ใส่ข้อมูลให้ครบด้วยพี่ ถ้าไม่ได้ยังไงติดต่อฝ่ายเทคนิค)")';
    echo '</script>';
}

echo '<meta http-equiv= "refresh" content="0; URL=EditDataUserForAdmin.php?ID_user='.$id_user.'">';

mysqli_close($conn);

?>