<?php
include 'connect_server.php';
include('sessionforadmin.php');
session_start();

$username_login = $set_user_login;
$sql = "SELECT * from `user` WHERE user_username='$username_login'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $error_confirm="";
    $old_password = hash('sha1', $_POST['old_password_user']);
    $confirm_password = hash('sha1', $_POST['confirm_password_user']);
    if($row['user_password']==$old_password){
        if($old_password==$confirm_password) {
            $new_password = hash('sha1', $_POST['new_password_user']);
            include 'admin_edit_password.php';       
        }else {
            $error_confirm="ยืนยันรหัสผ่านผิด";
        }
    }else {
        $error_confirm="รหัสผ่านผิด";
    }   
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <?php include 'menu_for_admin.php'; ?>
    <?php include 'menu_for_admin_setting.php'; ?>
    <br>
    <div>
    <h2>บัญชีผู้ใช้</h2><br>
        <h2>แก้ไขบัญชีผู้ใช้</h2><br>
            id คือ <?php echo $set_user_login ?><br>
            <form>
                ไอดี : <input type="text" class="form-control" name="id_user" value="<?= $row['ID_user'] ?>">
                ชื่อผู้ใช้ : <input type="text" class="form-control" name="id_user" value="<?= $row['user_username'] ?>">
                อีเมล : <input type="text" class="form-control" name="id_user" value="<?= $row['user_email'] ?>">
            </form>
            แก้ไขอีเมล<br>
            <form action="admin_edit_email.php" method="post">
                <input type="hidden" class="form-control" name="id_user" value="<?= $row['ID_user'] ?>">
                อีเมลใหม่ : <input type="text" class="form-control" name="email_user" title=""><br>
                <input type="submit" class="btn btn-success" value="ยืนยันการเปลี่ยนอีเมล">
            </form>
            แก้ไขรหัสผ่าน<br>
            <form action="" method="post">
                <input type="hidden" class="form-control" name="id_user" value="<?= $row['ID_user'] ?>">
                รหัสผ่านเดิม : <input type="text" class="form-control" name="old_password_user" title=""><br>
                ยืนยันรหัสผ่าน : <input type="text" class="form-control" name="confirm_password_user" title=""><br>
                <?php echo "$error_confirm".$new_password."<br>"; ?>
                กรุณากรอกรหัสผ่านเดิมเพื่อยืนยันการเปลี่ยนรหัสผ่าน<br>
                รหัสผ่านใหม่ : <input type="text" class="form-control" name="new_password_user" title=""><br>
                <input type="submit" class="btn btn-success" value="ยืนยันการเปลี่ยนรหัสผ่าน">
            </form>
    </div>
    <?php mysqli_close($conn); ?>
</body>
<?php include 'footer_for_admin.php'; ?>
</html>