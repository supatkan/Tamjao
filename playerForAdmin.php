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
        <a class="text-warning glow" href="AllPlayyerForAdmin.php"><h2><b>&laquo; PLAYER</b></h2></a>
        <div class="flex-container">
            <div class="flex-item-left anime">               
                <?php include 'photo.php'; ?>
            </div>
            <div class="flex-item-right text-warning">
                <div class="row d-flex justify-content-center">
                    <div class="col-md">
                        <br>
                        <div class="img-fluid">
                            <img class="img-fluid mins" src=image/frame/top_1.png>
                        </div>
                        <div id="con">
                            <div class="divtext">
                                <form>
                                    ID : <?= $row['id_player'] ?><br>
                                    ชื่อ : <?= $row['name'] ?><br>
                                    นามสกุล : <?= $row['surname'] ?><br>
                                    ชื่อเล่น : <?= $row['nickname'] ?><br>
                                    เพศ : <?= $row['sex'] ?><br>
                                    เลเวลผู้เล่น : <?= $row['LV_player'] ?><br>
                                    เลเวลตัวละคร : <?= $row['LV_avatar'] ?><br>
                                    เลเวลเกราะ : <?= $row['LV_costume'] ?><br>
                                    เลเวลอาวุธ : <?= $row['LV_weapon'] ?><br>
                                    เลเวลแหวน : <?= $row['LV_ring'] ?><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> 
    
</body>
<?php include 'foot.php'; ?>

</html>