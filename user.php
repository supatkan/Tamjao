<?php
include 'connect_server.php';
include 'set_style.php';

$id_user = $_GET['ID_user'];
$sql = "SELECT * from `user` WHERE `ID_user`='$id_user'";
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
    <?php include 'menu_no_user.php'; ?>
    <br>
    <div class="container">
        <a class="text-warning glow" href="ranking.php"><h2><b>&laquo; USER</b></h2></a>
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
                            <div>
                                <form class="divtext">
                                    ID : <?= $row['ID_user'] ?><br>
                                    ชื่อ : <?= $row['user_name'] ?><br>
                                    นามสกุล : <?= $row['user_surname'] ?><br>
                                    ชื่อเล่น : <?= $row['user_nickname'] ?><br>
                                    เพศ : <?= $row['user_sex'] ?><br>
                                    เลเวลผู้เล่น : <?= $row['user_Level'] ?><br>
                                    เลเวลเกราะ : <?= $row['user_Level_costume'] ?><br>
                                    เลเวลอาวุธ : <?= $row['user_Level_weapon'] ?><br>
                                    เลเวลแหวน : <?= $row['user_Level_ring'] ?><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</body>
<?php include 'footer_no_user.php'; ?>

</html>