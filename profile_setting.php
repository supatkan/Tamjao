<?php
include 'connect_server.php';
include('session.php');
session_start();

$username_login = $set_user_login;
$sql = "SELECT * from `user` WHERE user_username='$username_login'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <?php include 'menu_for_user.php'; ?>
    <?php include 'menu_for_user_setting.php'; ?>
    <br>
    <div>
    <h2>บัญชีผู้ใช้</h2><br>
        <h2>แก้ไขข้อมูลผู้ใช้</h2><br>
            id คือ <?php echo $set_user_login ?><br>
            แก้ไขข้อมูลส่วนตัว<br>
            <form action="user_edit_profile.php" method="post">
                <input type="hidden" class="form-control" name="id_user" value="<?= $row['ID_user'] ?>">
                ชื่อ : <input type="text" class="form-control" name="name_user" value="<?= $row['user_name'] ?>"><br>
                นามสกุล : <input type="text" class="form-control" name="surname_user" value="<?= $row['user_surname'] ?>"><br>
                ชื่อเล่น : <input type="text" class="form-control" name="nickname_user" value="<?= $row['user_nickname'] ?>"><br>
                เพศ : <input type="text" class="form-control" name="sex_user" value="<?= $row['user_sex'] ?>"><br>
                <input type="submit" class="btn btn-success" value="ยืนยันการเปลี่ยนอีเมล">
            </form>
    </div>
    <?php mysqli_close($conn); ?>
</body>
<?php include 'footer_for_user.php'; ?>
</html>