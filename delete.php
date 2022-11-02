<?php
include 'connectserver.php';

if(isset($_GET['id'])){
    $id_player = $_GET['id'];
    $deletedata = "DELETE FROM `player` WHERE `id_player`='$id_player'";

    if($conn->query($deletedata)){
        echo '<script type ="text/JavaScript">';
        echo 'alert("บันทึกการแก้ไขข้อมูลสำเร็จ")';
        echo '</script>';
    }else{
        echo '<script type ="text/JavaScript">';
        echo 'alert("บันทึกการแก้ไขข้อมูลไม่สำเร็จ(ใส่ข้อมูลให้ครบด้วยพี่ ถ้าไม่ได้ยังไงติดต่อเอิร์ธ)")';
        echo '</script>';
    }

    echo '<meta http-equiv= "refresh" content="0; URL=AllPlayyerForAdmin.php">';

}
mysqli_close($conn);

?>