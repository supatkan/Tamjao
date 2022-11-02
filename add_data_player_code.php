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

$checkidplayer = "SELECT `id_player` FROM `player` WHERE `id_player`='$id_player'";
$resultcheckidplayer = mysqli_query($db,$checkidplayer);
    
$countcheckidplayer = mysqli_num_rows($resultcheckidplayer);

if($countcheckidplayer<1){
    $insertp = "INSERT INTO `player`(`id_player`, `name`, `surname`, `nickname`, `sex`, `LV_player`, `LV_avatar`, `LV_costume`, `LV_weapon`, `LV_ring`) 
    VALUES ('$id_player','$name','$surname','$nickname','$sex',$LV_player,$LV_avatar,$LV_costume,$LV_weapon,$LV_ring)";


    if($conn->query($insertp)){
        echo '<script type ="text/JavaScript">';
        echo 'alert("บันทึกสำเร็จ")';
        echo '</script>';
    }else{
        echo '<script type ="text/JavaScript">';
        echo 'alert("บันทึกไม่สำเร็จ")';
        echo '</script>';
    }
    echo '<meta http-equiv= "refresh" content="0; URL=AllPlayyerForAdmin.php">';

}else{
    echo '<script type ="text/JavaScript">';
    echo 'alert("รหัสซ้ำ กรุณากรอกใหม่")';
    echo '</script>';
    echo '<meta http-equiv= "refresh" content="0; URL=addPlayer.php">';
}

mysqli_close($conn);

?>