<?php
include 'connectserver.php';

$id_player = $_POST['id_player'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$nickname = $_POST['nickname'];
$sex = $_POST['sex'];
$LV_player = $_POST['LV_player'];
$LV_avatar = $_POST['LV_avatar'];
$LV_costume = $_POST['LV_costume'];
$LV_weapon = $_POST['LV_weapon'];
$LV_ring = $_POST['LV_ring'];

$editdata = "UPDATE `player` SET `name`='$name',`surname`='$surname',`nickname`='$nickname',`sex`='$sex',`LV_player`=$LV_player,`LV_avatar`=$LV_avatar,`LV_costume`=$LV_costume,`LV_weapon`=$LV_weapon,`LV_ring`=$LV_ring WHERE `id_player`='$id_player'";


if($conn->query($editdata)){
    echo '<script type ="text/JavaScript">';
    echo 'alert("บันทึกการแก้ไขข้อมูลสำเร็จ")';
    echo '</script>';
}else{
    echo '<script type ="text/JavaScript">';
    echo 'alert("บันทึกการแก้ไขข้อมูลไม่สำเร็จ(ใส่ข้อมูลให้ครบด้วยพี่ ถ้าไม่ได้ยังไงติดต่อเอิร์ธ)")';
    echo '</script>';
}

echo '<meta http-equiv= "refresh" content="0; URL=AllPlayyerForAdmin.php">';

mysqli_close($conn);

?>