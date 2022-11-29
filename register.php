<?php
include 'connect_server.php';
include 'set_style.php';

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username ,password and confirmpassword sent from form 
    
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    $myconfirmpassword = $_POST['confirmpassword'];


    $sql = "SELECT `ID_user` FROM `user` WHERE `user_username` = '$myusername'";
    $result = mysqli_query($db,$sql);
    $count = (int)mysqli_num_rows($result);
    if($count == 1) {
        $errorusername = "ชื่อผู้ใช้นี้มีคนใช้ไปแล้ว กรุณากรอกใหม่";    
    }elseif($mypassword != $myconfirmpassword){
        $errorusername="";
        $errorpassword = "การยืนยันรหัสผ่านไม่ถูกต้อง กรุณากรอกใหม่";
    }else {
        $errorpassword="";
        include 'code_register.php';
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

<body class="background-all text-warning">
    <?php include 'menu_no_user.php'; ?>
    <div class="container">
        <br>
        <br>
        <div align = "center">
            <div class="card" style="background-color: #212529; width: 18rem;">
                <div class="card-body">
                <div class="card-title" style = "padding:3px;"><b>สมัครสมาชิก</b></div>
                    
                <div style = "margin:30px">
                
                    <form action = "" method = "post">
                        <div class="form-group">
                            <label class="login">ชื่อผู้ใช้  :</label>
                            <input type = "text" name = "username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <?php echo $errorusername; ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputPassword1">รหัสผ่าน  :</label>
                            <input type = "password" name = "password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputPassword1">ยืนยันรหัสผ่าน  :</label>
                            <input type = "password" name = "confirmpassword" class="form-control" id="exampleInputPassword2" placeholder="Password">
                            <?php echo $errorpassword; ?>
                        </div>
                        <br>
                        <button type = "submit" class="btn btn-warning">Submit</button>
                    </form>
                        
                </div>
                    
            </div>
                
            </div>
            <br>
            
        </div>
    </div>
</body>
<?php include 'footer_no_user.php'; ?>

</html>