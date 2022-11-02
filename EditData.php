<?php
include 'connectserver.php';
include 'setStyle.php';
include('session.php');
session_start();

$id_player = $_GET['id_player'];
$sql = "SELECT * from `player` WHERE id_player='$id_player'";
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

<body class="background-all text-warning">
    <?php include 'menuForAdmin.php'; ?>
    <br>
    <div class="container">
        <h2>PLAYER</h2>
        <div class="flex-container">
            <div class="flex-item-left">
                <?php include 'photo.php'; ?>
            </div>
            <div class="flex-item-right">
            <h2>แก้ไขข้อมูล</h2>
                <form>
                    <fieldset disabled>
                        <input class="form-control" name="id_player" value="<?= $row['id_player'] ?>">
                    </fieldset>
                </form>
                <form action="edit_code.php" method="POST">
                    <input type="hidden" name="id_player" value="<?= $row['id_player'] ?>"><br>
                    ชื่อ : <input type="text" class="form-control" name="name" value="<?= $row['name'] ?>"><br>
                    นามสกุล : <input type="text" class="form-control" name="surname" value="<?= $row['surname'] ?>"><br>
                    ชื่อเล่น : <input type="text" class="form-control" name="nickname" value="<?= $row['nickname'] ?>"><br>
                    เพศ :
                    <select class="form-control" name="sex">
                        <option name="sex" value="<?= $row['sex'] ?>"><?= $row['sex'] ?></option>
                        <option name="sex" value="ชาย">ชาย</option>
                        <option name="sex" value="หญิง">หญิง</option>
                    </select><br>
                    เลเวลผู้เล่น : <input type="number" class="form-control" name="LV_player" value="<?= $row['LV_player'] ?>" min="1" max="99"><br>
                    เลเวลตัวละคร : <input type="number" class="form-control" name="LV_avatar" value="<?= $row['LV_avatar'] ?>" min="1" max="10"><br>
                    เลเวลเกราะ : <input type="number" class="form-control" name="LV_costume" value="<?= $row['LV_costume'] ?>" min="0" max="10"><br>
                    เลเวลอาวุธ : <input type="number" class="form-control" name="LV_weapon" value="<?= $row['LV_weapon'] ?>" min="0" max="10"><br>
                    เลเวลแหวน : <input type="number" class="form-control" name="LV_ring" value="<?= $row['LV_ring'] ?>" min="0" max="10"><br>
                    <input type="submit" class="btn btn-success" name="save" value="บันทึก">
                </form>
            </div>
        </div>
        
    </div>
    <?php mysqli_close($conn); ?>
    <br>
    <br>
    <br>
    <br>
</body>
<?php include 'foot.php'; ?>

</html>