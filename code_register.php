<?php
include 'connect_server.php';

$username = $myusername;
$password = hash('sha1', $mypassword);

$checkiduser = "SELECT * FROM `user` ORDER BY no_user DESC";
$resultcheckiduser = mysqli_query($db,$checkiduser);
$row = mysqli_fetch_array($resultcheckiduser,MYSQLI_ASSOC);
$active = $row['active'];
$countcheck = (int)mysqli_num_rows($resultcheckiduser);
if($countcheck<1){
    $countiduser=1;
    $id='TJ0000000'.$countiduser;
}else{
    $countcheckiduser = (int)$row['no_user'];
    $countiduser = $countcheckiduser+1;
    if($countiduser<10){
        $id='TJ0000000'.$countiduser;
    }elseif($countiduser<100){
        $id='TJ000000'.$countiduser;   
    }elseif($countiduser<1000){
        $id='TJ00000'.$countiduser;  
    }elseif($countiduser<10000){
        $id='TJ0000'.$countiduser;
    }elseif($countiduser<100000){
        $id='TJ000'.$countiduser;
    }elseif($countiduser<1000000){
        $id='TJ00'.$countiduser;
    }elseif($countiduser<10000000){
        $id='TJ0'.$countiduser;
    }elseif($countiduser<100000000){
        $id='TJ'.$countiduser;
    }else{
        echo '<script type ="text/JavaScript">';
        echo 'alert("โปรดติดต่อ Admin เพื่อแก้ไข code ภายใน")';
        echo '</script>';
    }
}

$insertp = "INSERT INTO `user`(`no_user`, `ID_user`, `user_username`, `user_password`) VALUES ('$countiduser','$id','$username','$password')";


if($conn->query($insertp)){
    echo '<script type ="text/JavaScript">';
    echo 'alert("ลงทะเบียนสำเร็จ")';
    echo '</script>';
    echo '<meta http-equiv= "refresh" content="0; URL=login">';
}else{
    echo '<script type ="text/JavaScript">';
    echo 'alert("โปรดลงทะเบียนใหม่")';
    echo '</script>';
    echo '<meta http-equiv= "refresh" content="0; URL=register">';
}

mysqli_close($conn);

?>