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
        <h2>PLAYER</h2><br>
        <h2>เพิ่มข้อมูลผู้เล่น</h2><br>
            <form action="add_data_player_code.php" method="post">
                ID : <input type="text" class="form-control" name="id_player" pattern=".{4}" title="กรุณากรอกอักษร 4 ตัวอักษร" required><br>
                ชื่อ : <input type="text" class="form-control" name="name" autocomplete="off" value="" title="กรุณากรอกชื่อ" required><br>
                นามสกุล : <input type="text" class="form-control" name="surname" autocomplete="off" value="" title="กรุณากรอกนามสกุล"  required><br>                    
                ชื่อเล่น : <input type="text" class="form-control" name="nickname" autocomplete="off" value="" title="กรุณากรอกชื่อเล่น" required><br>
                เพศ :
                <select class="form-control" name="sex" required>
                    <option name="sex" value="ชาย">ชาย</option>
                    <option name="sex" value="หญิง">หญิง</option>
                </select><br>
                เลเวลผู้เล่น : <input type="number" class="form-control" name="LV_player" min="1" max="99" autocomplete="off" value="1" required><br>
                เลเวลตัวละคร : <input type="number" class="form-control" name="LV_avatar" min="1" max="10" autocomplete="off" value="1" required><br>
                เลเวลเกราะ : <input type="number" class="form-control" name="LV_costume" min="0" max="10" autocomplete="off" value="0" required><br>
                เลเวลอาวุธ : <input type="number" class="form-control" name="LV_weapon" min="0" max="10" autocomplete="off" value="0" required><br>
                เลเวลแหวน : <input type="number" class="form-control" name="LV_ring" min="0" max="10" autocomplete="off" value="0" required><br>
                <input type="submit" class="btn btn-success" value="บันทึก">
            </form>        
    </div>
    <?php mysqli_close($conn); ?>
</body>
<?php include 'foot.php'; ?>

</html>