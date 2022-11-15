<?php
include 'connectserver.php';
include 'setStyle.php';
$query = mysqli_query($con, $sql);
if(isset($_POST["txtKeyword"])){
    $strKeyword = $_POST["txtKeyword"];
    $strsearch = "WHERE name LIKE '%".$strKeyword."%' ";
}else{
    $strsearch = "";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body class="background-all text-warning">
    <?php include 'menu.php'; ?>
    <br>
    <div class="container">
        <img src=image/front_cover.png width=100%>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-8">
                <h2><b>PLAYER</b></h2>
            </div>
            <div class="col-sm-4 text-right">
                <div>
                    <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
                        <div class="input-group">
                            <input type="search" id="txtKeyword" name="txtKeyword" class="form-control" value="<?php echo $strKeyword;?>">
                            <button type="submit" class="btn btn-warning">ค้นหาชื่อ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        
        <table class="table table-hover text-warning">
            <thead class="table-row">
                <tr>
                    <td scope="col"><b>ลำดับ</b></td>
                    <td scope="col"><b>ID</b></td>
                    <td scope="col"><b>ชื่อ</b></td>
                    <td scope="col"><b>นามสกุล</b></td>
                    <td scope="col"><b>Level</b></td>
                </tr>
            </thead>
            <tbody data-click-to-select="true" class="table-dark">
                <?php
                    $perpage = 10;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $start = ($page - 1) * $perpage;
                    $sql = "SELECT * FROM `player` ".$strsearch."ORDER BY `LV_player` DESC LIMIT $start , $perpage";                
                    $result = $conn->query($sql);
                    if (mysqli_num_rows($result) > 0) {
                        $i = $start+1;
                        while ($row = mysqli_fetch_array($result)) {            
                ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><a href="player.php?id_player=<?= $row['id_player']; ?>" class="text-warning"><?= $row['id_player']; ?></a></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['surname']; ?></td>
                                <td><?= $row['LV_player']; ?></td>
                            </tr>
                <?php        
                            $i++;
                        }
                ?>
            </tbody>
        </table>
        <?php
            }else{
                echo "<td colspan='6'>No result found</td>";
            }
            
        ?>
        <?php
            $sql2 = "SELECT * FROM `player`".$strsearch;
            $query2 = mysqli_query($conn, $sql2);
            $total_record = mysqli_num_rows($query2);
            $total_page = ceil($total_record / $perpage);
            if($total_page>1){
        ?>
        <nav>
        <ul class="pagination">
                <li class="nav-item">                    
                    <a class="nav-link" href="index.php?page=1" aria-label="Previous">
                    <button type="button" class="btn text-warning">&laquo;</button>
                    </a>
                </li>
                <?php for($i = 1; $i <= $total_page; $i++){ ?>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?page=<?php echo $i; ?>">
                        <?php if($i == $page){ ?>
                            <button type="button" class="btn btn-dark active text-warning"><?php echo $i; ?></button>
                        <?php }else{ ?>
                            <button type="button" class="btn text-warning"><u><?php echo $i; ?></u></button>
                        <?php } ?>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=<?php echo $total_page;?>" aria-label="Next">
                    <button type="button" class="btn text-warning">&raquo;</button>
                    </a>
                </li>
            </ul>
        </nav>
        <?php }; ?>
    </div>
    <?php mysqli_close($conn); ?>

</body>
<?php include 'foot.php'; ?>

</html>