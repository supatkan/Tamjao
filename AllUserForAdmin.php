<?php
include 'connect_server.php';
include('sessionforadmin.php');
session_start();
if(isset($_POST["txtKeyword"])){
    $strKeyword = $_POST["txtKeyword"];
    $strsearch = "WHERE user_name LIKE '%".$strKeyword."%' ";
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

<body>
    <?php include 'menu_for_admin.php'; ?>
    <br>
    <div>
        <h2><b>ข้อมูลผู้เล้นทั้งหมด</b></h2>
        <br>
        <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
            <div class="input-group">
                <input type="search" id="txtKeyword" name="txtKeyword" class="form-control" value="<?php echo $strKeyword;?>">
                <button type="submit" class="btn btn-warning">ค้นหาชื่อ</button>
            </div>
        </form>
    </div>
    <div>
    <table class="table table-hover table-dark text-warning">
            <thead>
                <tr>
                    <td scope="col">ลำดับ</td>
                    <td scope="col">ID</td>
                    <td scope="col">ชื่อ</td>
                    <td scope="col">นามสกุล</td>
                    <td scope="col">Level</td>
                    <td scope="col">แก้ไข</td>
                </tr>
            </thead>
            <tbody data-click-to-select="true">
                <?php
                    $perpage = 10;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    
                    $start = ($page - 1) * $perpage;
                    $sql = "SELECT * FROM `user` ".$strsearch."LIMIT $start , $perpage";
                    $result = $conn->query($sql);
                    if (mysqli_num_rows($result) > 0) {
                        $i = $start+1;
                        while ($row = mysqli_fetch_array($result)) {            
                ?>
                            <tr id="<?php echo $row['ID_user'] ?>">
                                <td><?= $i; ?></td>
                                <td><a href="EditDataUserForAdmin.php?ID_user=<?= $row['ID_user']; ?>" class="text-warning"><?= $row['ID_user']; ?></a></td>
                                <td><?= $row['user_name']; ?></td>
                                <td><?= $row['user_surname']; ?></td>
                                <td><?= $row['user_Level']; ?></td>
                                <td><button class="btn btn-warning editdata">แก้ไข</button></td>
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
            $sql2 = "SELECT * FROM `user`".$strsearch;
            $query2 = mysqli_query($conn, $sql2);
            $total_record = mysqli_num_rows($query2);
            $total_page = ceil($total_record/$perpage);
            if($total_page>1){
        ?>
        <nav>
            <ul class="pagination">
                <li class="nav-item">                    
                    <a class="nav-link" href="AllUserForAdmin.php?page=1" aria-label="Previous">
                    <button type="button" class="btn text-warning">&laquo;</button>
                    </a>
                </li>
                <?php for($i = 1; $i <= $total_page; $i++){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="AllUserForAdmin.php?page=<?php echo $i; ?>">
                        <?php if($i == $page){ ?>
                            <button type="button" class="btn btn-dark active text-warning"><?php echo $i; ?></button>
                        <?php }else{ ?>
                            <button type="button" class="btn text-warning"><?php echo $i; ?></button>
                        <?php } ?>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="AllUserForAdmin.php?page=<?php echo $total_page;?>" aria-label="Next">
                    <button type="button" class="btn text-warning">&raquo;</button>
                    </a>
                </li>
            </ul>
        </nav>
        <?php }; ?>
    </div>
</body>
<?php include 'footer_for_admin.php'; ?>

<script type="text/javascript">

    $('.editdata').click(function(){
        var id = $(this).parents("tr").attr("id");
        window.location.replace("EditDataUserForAdmin.php?ID_user="+id);
    });

</script>


</html>