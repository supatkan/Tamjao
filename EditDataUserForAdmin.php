<?php
include 'connect_server.php';
include('sessionforadmin.php');
session_start();

$id_user = $_GET['ID_user'];
$sql = "SELECT * from `user` WHERE ID_user='$id_user'";
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
    <?php include 'menu_for_admin.php'; ?>
    <br>
    <div>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'editAccout')" id="defaultOpen">แก้ไขบัญชีผู้ใช้</button>
        <button class="tablinks" onclick="openCity(event, 'editProfile')">แก้ไขข้อมูลส่วนตัวผู้ใช้</button>
        <button class="tablinks" onclick="openCity(event, 'editCouse')">คอร์สเรียน</button>
    </div>

    <div id="editAccout" class="tabcontent">
        <h3>แก้ไขบัญชีผู้ใช้</h3><br>
            <form>
                ไอดี : <input type="text" class="form-control" name="id_user" value="<?= $row['ID_user'] ?>">
                ชื่อผู้ใช้ : <input type="text" class="form-control" name="id_user" value="<?= $row['user_username'] ?>">
                อีเมล : <input type="text" class="form-control" name="id_user" value="<?= $row['user_email'] ?>">
                เบอร์โทรศัพท์ : <input type="text" class="form-control" name="id_user" value="<?= $row['user_tel'] ?>">
            </form>
            แก้ไขอีเมล<br>
            <form action="user_edit_email_for_admin.php" method="post">
                <input type="hidden" class="form-control" name="id_user" value="<?= $row['ID_user'] ?>">
                อีเมลใหม่ : <input type="text" class="form-control" name="email_user" title="" value="<?= $row['user_email'] ?>"><br>
                เบอร์โทรศัพท์ใหม่ : <input type="text" class="form-control" name="tel_user" title="" value="<?= $row['user_tel'] ?>"><br>
                <input type="submit" class="btn btn-success" value="ยืนยันการเปลี่ยนอีเมลและเบอร์โทร">
            </form>
            แก้ไขรหัสผ่าน<br>
            <form action="user_edit_password_for_admin.php" method="post">
                <input type="hidden" class="form-control" name="id_user" value="<?= $row['ID_user'] ?>">
                รหัสผ่านใหม่ : <input type="text" class="form-control" name="new_password_user" title=""><br>
                <input type="submit" class="btn btn-success" value="ยืนยันการเปลี่ยนรหัสผ่าน">
            </form>
    </div>

    <div id="editProfile" class="tabcontent">
        <h3>แก้ไขข้อมูลส่วนตัวผู้ใช้</h3><br>
            <form action="user_edit_profile_for_admin.php" method="post">
                <input type="hidden" class="form-control" name="id_user" value="<?= $row['ID_user'] ?>">
                ชื่อ : <input type="text" class="form-control" name="name_user" value="<?= $row['user_name'] ?>"><br>
                นามสกุล : <input type="text" class="form-control" name="surname_user" value="<?= $row['user_surname'] ?>"><br>
                ชื่อเล่น : <input type="text" class="form-control" name="nickname_user" value="<?= $row['user_nickname'] ?>"><br>
                เพศ : <input type="text" class="form-control" name="sex_user" value="<?= $row['user_sex'] ?>"><br>
                ค่าประสบการณ์ : <input type="text" class="form-control" name="user_EXP" value="<?= $row['user_EXP'] ?>"><br>
                เลเวลตัวละคร : <input type="text" class="form-control" name="user_Level" value="<?= $row['user_Level'] ?>"><br>
                เลเวลเกาะ : <input type="text" class="form-control" name="user_Level_costume" value="<?= $row['user_Level_costume'] ?>"><br>
                เลเวลอาวุธ : <input type="text" class="form-control" name="user_Level_weapon" value="<?= $row['user_Level_weapon'] ?>"><br>
                เลเวลแหวน : <input type="text" class="form-control" name="user_Level_ring" value="<?= $row['user_Level_ring'] ?>"><br>
                <input type="submit" class="btn btn-success" value="ยืนยันการเปลี่ยนข้อมูล">
            </form>
    </div>

    <div id="editCouse" class="tabcontent">
        <h3>คอร์สเรียน</h3>
        <p>รอก่อน</p>
    </div>
    </div>
</body>
<?php include 'footer_for_admin.php'; ?>


<script>
function openSetting(evt, settingName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</html>